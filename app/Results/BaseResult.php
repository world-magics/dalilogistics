<?php

namespace App\Results;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseResult implements Responsable
{
    /** @var boolean */
    public $success = true;

    /** @var ?string */
    public $error = null;

    /** @var array */
    protected $exceptKeys = [];

    /** @var array */
    protected $onlyKeys = [];

    public function __construct(array $parameters = [])
    {
        $fields = $this->getFields();

        foreach ($fields as $field => $validator) {

            $value = $parameters[$field] ?? $this->{$field} ?? null;

            $this->{$field} = $value;

            unset($parameters[$field]);
        }
    }

    protected function getFields(): array
    {
        return ResultCache::resolve(static::class, function () {

            $class = new \ReflectionClass(static::class);

            $properties = [];

            foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $reflectionProperty) {

                if ($reflectionProperty->isStatic()) {
                    continue;
                }

                $field = $reflectionProperty->getName();

                $properties[$field] = $reflectionProperty;//FieldValidator::fromReflection($reflectionProperty);
            }

            return $properties;
        });
    }

    public function setError(string $error)
    {
        $this->success = false;
        $this->error = $error;
        return $this;
    }

    public function except(string ...$keys): BaseResult
    {
        $valueObject = clone $this;

        $valueObject->exceptKeys = array_merge($this->exceptKeys, $keys);

        return $valueObject;
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function all(): array
    {
        $data = [];

        $class = new \ReflectionClass(static::class);

        $properties = $class->getProperties(\ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $reflectionProperty) {

            if ($reflectionProperty->isStatic()) {
                continue;
            }

            $data[$reflectionProperty->getName()] = $reflectionProperty->getValue($this);
        }

        return $data;
    }

    /**
     * @param array $array
     * @return array
     * @throws \ReflectionException
     */
    protected function parseArray(array $array): array
    {
        foreach ($array as $key => $value) {
            if ($value instanceof BaseResult || $value instanceof BaseResult) {
                $array[$key] = $value->toArray();
                continue;
            }

            if (!is_array($value)) {
                continue;
            }

            $array[$key] = $this->parseArray($value);
        }

        return $array;
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function toArray(): array
    {
        if (count($this->onlyKeys)) {
            $array = Arr::only($this->all(), $this->onlyKeys);
        } else {
            $array = Arr::except($this->all(), $this->exceptKeys);
        }

        $array = $this->parseArray($array);

        return $array;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return Response
     * @throws \ReflectionException
     */
    public function toResponse($request): Response
    {
        $res = [
            "success" => $this->success,
            "error" => $this->error,
            "data" => $this->success ? $this->except('success', 'error')->toArray() : null
        ];

        return new JsonResponse($res);
    }
}

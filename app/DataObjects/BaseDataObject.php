<?php

namespace App\DataObjects;

use App\Requests\BaseRequest;
use Illuminate\Support\Arr;

abstract class BaseDataObject
{
    public function __construct(array $parameters = [])
    {
        try {
            $class = new \ReflectionClass(static::class);

            $fields = [];

            foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $reflectionProperty) {

                if ($reflectionProperty->isStatic()) {
                    continue;
                }

                $field = $reflectionProperty->getName();

                $fields[$field] = $reflectionProperty;
            }

            foreach ($fields as $field => $validator) {

                $value = $parameters[$field] ?? $this->{$field} ?? null;

                $this->{$field} = $value;

                unset($parameters[$field]);
            }
        } catch (\Exception $exception) {

        }
    }

    public static function createFromRequest(BaseRequest $request)
    {
        $arr = $request->validated();
        return new static($arr);
    }

    /**
     * @param bool $trim_nulls
     * @return array
     */
    public function all(bool $trim_nulls = false): array
    {
        $data = [];

        try {
            $class = new \ReflectionClass(static::class);

            $properties = $class->getProperties(\ReflectionProperty::IS_PUBLIC);

            foreach ($properties as $reflectionProperty) {

                if ($reflectionProperty->isStatic()) {
                    continue;
                }

                $value = $reflectionProperty->getValue($this);

                if ($trim_nulls === true) {
                    if (!is_null($value)) {
                        $data[$reflectionProperty->getName()] = $value;
                    }
                } else {
                    $data[$reflectionProperty->getName()] = $value;
                }

            }
        } catch (\Exception $exception) {

        }

        return $data;
    }
}

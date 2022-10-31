<?php

namespace App\ViewModels;

use App\DataObjects\BaseDataObject;
use App\DataObjects\User\UserData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Fluent;

abstract class BaseViewModel
{
    /**
     * @var BaseDataObject
     */
    protected $_data;

    public function __construct($data)
    {
        $this->_data = $data;
        $this->init();
    }

    protected abstract function populate();

    protected function init()
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

                $value = $this->_data->{$field} ?? null;

                $this->{$field} = $value;
            }
        } catch (\Exception $exception) {

        }

        $this->populate();
    }

    public function toView(string $view_name, array $data = [])
    {
        return view($view_name, array_merge(['item' => $this, 'data' => new Fluent($data)]));
    }
}

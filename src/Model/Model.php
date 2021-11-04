<?php

namespace Awork\Model;

use Illuminate\Contracts\Support\Arrayable;
use ReflectionClass;

class Model implements Arrayable
{
    public function toArray(): array
    {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties();
        $array = [];
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($this);
        }
        return $array;
    }
}

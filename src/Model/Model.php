<?php

namespace Awork\Model;

use Illuminate\Contracts\Support\Arrayable;
use ReflectionClass;

class Model implements Arrayable
{
    public function toArray(): array
    {
        return $this->getPropertiesRecursively($this);
    }

    private function getPropertiesRecursively(mixed $object): array
    {
        $array = [];
        $reflection = new ReflectionClass($object);

        while ($reflection) {
            $properties = $reflection->getProperties();
            foreach ($properties as $property) {
                $property->setAccessible(true);
                $value = $property->getValue($object);
                $array[$property->getName()] = ($value instanceof Arrayable) ? $value->toArray() : $value;
            }
            $reflection = $reflection->getParentClass();
        }

        return $array;
    }
}

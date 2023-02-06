<?php

namespace R2SArrayHelper\Traits;

trait CanBeArray
{
    protected function fromArray(array $data): self
    {
        return new self(...$data);
    }

    protected function toArray(): array
    {
        $properties = $this->getClassProperties();
        $ar = [];
        foreach ($properties as $property) {
            $ar[$property] = $this->$property;
        }
        return $ar;
    }

    private function getClassProperties(): array
    {
        return array_map(
            fn ($property) => $property->getName(),
            (new \ReflectionClass(self::class))->getProperties()
        );
    }
}
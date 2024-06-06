<?php

namespace App\JDR\Class;

use App\JDR\Enum\TypeEnum;

class Tirage
{
    public function __construct(
        private TypeEnum $type,
        private float $value,
    ) {

    }

    public function getType(): string
    {
        return $this->type->value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
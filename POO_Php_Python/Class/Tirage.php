<?php

namespace App\JDR\Class;

use App\JDR\Enum\TypeEnum;

class Tirage
{
    public function __construct(
        private TypeEnum $type,
    ) {

    }

    public function getType(): string
    {
        return $this->type->value;
    }
}
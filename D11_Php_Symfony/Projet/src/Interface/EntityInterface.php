<?php

namespace App\Interface;

use stdClass;

interface EntityInterface
{
    public function getId(): ?int;

    public function fromArray(array $entity): self;
}
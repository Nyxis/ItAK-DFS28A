<?php

namespace App\JDR\Trait;

trait StringableTrait
{
    public function __toString() {

        $return = '=====' . $this::class . '=====' . PHP_EOL;

        $properties = get_object_vars($this);
        foreach ($properties as $key => $value) {
            $return .= '| ' . $key . ' => ' . $value . PHP_EOL;
        }
        $return .= '============================';

        return $return;
    }
}
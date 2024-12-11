<?php
class Stuff
{
    private $name;
    private $modifiers;

    public function __construct($name, $modifiers)
    {
        $this->name = $name;
        $this->modifiers = $modifiers;
    }

    public function getModifiers()
    {
        return $this->modifiers;
    }
}


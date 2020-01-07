<?php

namespace Src;

class Salary
{
    public $name;
    public $value;

    public function setData($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
}

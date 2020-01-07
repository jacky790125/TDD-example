<?php

namespace Src;

use Salary;

class PaymentList
{
    public $list = array();

    public function insert($salary)
    {
        $this->list[] = $salary;
    }
}

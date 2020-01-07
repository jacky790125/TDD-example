<?php

namespace Src;

class PaymentList
{
    public $list = array();

    public function insert($salary)
    {
        $this->list[] = $salary;
    }

    public function calculateSum()
    {
        $sum = 0;
        foreach ($this->list as $temp) {
            $sum = $sum + $temp->value;
        }
        return $sum;
    }
}

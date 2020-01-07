<?php
// tests/SalaryTest.php

use PHPUnit\Framework\TestCase;
use Src\Salary;

class SalaryTest extends TestCase
{
    public function testSetData()
    {
        $temp = new Salary();
        $temp->setData('Jacky', 100);
        $this->assertSame('Jacky', $temp->name);
        $this->assertSame(100, $temp->value);
    }
}

<?php

use PHPUnit\Framework\TestCase;
use Src\Salary;
use Src\PaymentList;

class PaymentListTest extends TestCase{
    public function testInsertSalary(){
        $salary = new Salary();
        $salary->setData("Jacky", 120);

        $paymentList = new PaymentList();
        
        // 確認 list 沒有資料
        $this->assertSame(0, count($paymentList->list));

        $paymentList->insert($salary);

        // 確認 list 輸入了一筆資料，且名稱為 Jacky
        $this->assertSame(1, count($paymentList->list));
        $this->assertSame('Jacky', $paymentList->list[0]->name);
    }
}
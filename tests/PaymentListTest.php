<?php

use PHPUnit\Framework\TestCase;
use Src\Salary;
use Src\PaymentList;

class PaymentListTest extends TestCase{
    public function testInsertSalary(){
        // Add two object
        $salary = new Salary();
        $salary->setData("Jacky", 120);

        $salary2 = new Salary();
        $salary2->setData("Ting", 188);

        $paymentList = new PaymentList();

        // 確認 list 沒有資料
        $this->assertSame(0, count($paymentList->list));

        $paymentList->insert($salary);
        $paymentList->insert($salary2);

        // 確認 list 輸入了2筆資料
        $this->assertSame(2, count($paymentList->list));
        $this->assertSame('Jacky', $paymentList->list[0]->name);
        $this->assertSame('Ting', $paymentList->list[1]->name);

        return $paymentList;
    }

    /**
     * @depends testInsertSalary
     * ↑↑↑↑↑↑↑ 這一行竟然是有用的
     */
    public function testCalculateSum($paymentList)
    {
        $this->assertSame(308, $paymentList->calculateSum());
    }
}
<?php

use PHPUnit\Framework\TestCase;
use Src\Payday;

class PaydayTest extends TestCase
{
    public function testPaydayIsSlow()
    {
        $payday = new Payday();
        $result = $payday->pay();
        $this->assertSame('paid', $result[0]);
    }

    public function testPaydayByMock()
    {
        $payday = Mockery::mock(Payday::class);
        $payday->shouldReceive('pay')
            ->once()
            ->andReturn(['paid','first']);
        
        $result = $payday->pay();
        $this->assertSame('paid', $result[0]);

        Mockery::close();
    }
}

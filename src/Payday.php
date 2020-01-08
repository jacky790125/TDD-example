<?php

namespace Src;

class Payday
{ 
    public function pay()
    {
        sleep(3);

        return ['paid', 'is', 'so', 'slow'];
    }
}

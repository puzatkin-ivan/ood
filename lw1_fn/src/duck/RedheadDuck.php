<?php

class RedheadDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(
            FlyBehavior\getFlyWithWings(),
            QuackBehavior\getQuackBehavior(),
            DanceBehavior\getMinuetDanceBehavior());
    }

    public function display(): void
    {
        echo 'I\'m redhead duck!' . PHP_EOL;
    }
}
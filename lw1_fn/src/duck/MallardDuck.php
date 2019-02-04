<?php

class MallardDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(
            FlyBehavior\getFlyWithWings(),
            QuackBehavior\getQuackBehavior(),
            DanceBehavior\getWaltzDanceBehavior());
    }

    public function display(): void
    {
        echo 'I\'m mallard duck!' . PHP_EOL;
    }
}
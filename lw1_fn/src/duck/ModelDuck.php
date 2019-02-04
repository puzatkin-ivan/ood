<?php

class ModelDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(
            FlyBehavior\getFlyNoWay(),
            QuackBehavior\getQuackBehavior(),
            DanceBehavior\getNoDanceBehavior());
    }

    public function display(): void
    {
        echo 'I\'m model duck!' . PHP_EOL;
    }
}
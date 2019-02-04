<?php

class RubberDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(
            FlyBehavior\getFlyNoWay(),
            QuackBehavior\getSqueakBehavior(),
            DanceBehavior\getNoDanceBehavior());
    }

    public function display(): void
    {
        echo 'I\'m rubber duck!' . PHP_EOL;
    }
}
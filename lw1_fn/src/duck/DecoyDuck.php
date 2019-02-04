<?php

class DecoyDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(
            FlyBehavior\getFlyNoWay(),
            QuackBehavior\getMuteQuackBehavior(),
            DanceBehavior\getNoDanceBehavior());
    }

    public function display(): void
    {
        echo 'I\'m decoy duck' . PHP_EOL;
    }

    public function dance(): void
    {
    }
}
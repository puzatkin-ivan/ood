<?php

class RubberDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(
            new FlyNoWay(),
            new SqueakBehavior(),
            new NoDanceBehavior());
    }

    public function display(): void
    {
        echo 'I\'m rubber duck!' . PHP_EOL;
    }
}
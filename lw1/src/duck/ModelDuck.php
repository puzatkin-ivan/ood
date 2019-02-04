<?php

class ModelDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(
            new FlyNoWay(),
            new QuackBehavior(),
            new NoDanceBehavior());
    }

    public function display(): void
    {
        echo 'I\'m model duck!' . PHP_EOL;
    }
}
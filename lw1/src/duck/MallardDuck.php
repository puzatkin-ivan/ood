<?php

class MallardDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(
            new FlyWithWings(),
            new QuackBehavior(),
            new WaltzDanceBehavior());
    }

    public function display(): void
    {
        echo 'I\'m mallard duck!' . PHP_EOL;
    }
}
<?php

class DecoyDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(new FlyNoWay(), new MuteQuackBehavior(), new NoDanceBehavior());
    }

    public function display(): void
    {
        echo 'I\'m decoy duck' . PHP_EOL;
    }

    public function dance(): void
    {
    }
}
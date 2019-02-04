<?php

class QuackBehavior implements IQuackBehavior
{
    public function quack(): void
    {
        echo 'Quack Quack!' . PHP_EOL;
    }
}
<?php

class SqueakBehavior implements IQuackBehavior
{
    public function quack(): void
    {
        echo 'Speak!' . PHP_EOL;
    }
}
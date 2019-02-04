<?php

class WaltzDanceBehavior implements IDanceBehavior
{
    public function dance(): void
    {
        echo 'I\'m dancing waltz.' . PHP_EOL;
    }
}
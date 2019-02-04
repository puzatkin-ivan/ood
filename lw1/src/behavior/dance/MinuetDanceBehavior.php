<?php

class MinuetDanceBehavior implements IDanceBehavior
{
    public function dance(): void
    {
        echo 'I\'m dancing minuet.' . PHP_EOL;
    }
}
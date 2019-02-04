<?php

class FlyWithWings implements IFlyBehavior
{
    /** @var int */
    private $flightCount = 0;

    public function fly(): void
    {
        ++$this->flightCount;
        echo 'Flight: ' . $this->flightCount . ' I\'m flying with wings!' . PHP_EOL;
    }
}
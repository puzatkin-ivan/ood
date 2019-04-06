<?php

namespace GumballMachine;

use State\StateInterface as State;
use State\HasQuarterState;
use State\NoQuarterState;
use State\SoldOutState;
use State\SoldState;

class GumballMachine implements GumballMachineInterface
{
    /** @var SoldState */
    private $soldState;
    /** @var SoldOutState */
    private $soldOutState;
    /** @var NoQuarterState */
    private $noQuarterState;
    /** @var HasQuarterState */
    private $hasQuarterState;
    /** @var State */
    private $state;
    /** @var int */
    private $count;

    public function __construct(int $numBalls)
    {
        $this->soldState = new SoldState($this);
        $this->soldOutState = new SoldOutState($this);
        $this->noQuarterState = new NoQuarterState($this);
        $this->hasQuarterState = new HasQuarterState($this);
        $this->state = $this->soldState;
        $this->count = $numBalls;

        if ($this->count > 0)
        {
            $this->state = $this->noQuarterState;
        }
    }

    public function releaseBall(): void
    {
        if ($this->count != 0)
        {
            echo 'A gumball comes rolling out the slot...' . PHP_EOL;
            --$this->count;
        }
    }

    public function getBallCount(): int
    {
        return $this->count;
    }

    public function setSoldOutState(): void
    {
        $this->state = $this->soldOutState;
    }

    public function setNoQuarterState(): void
    {
        $this->state = $this->noQuarterState;
    }

    public function setSoldState(): void
    {
        $this->state = $this->soldState;
    }

    public function setHasQuarterState(): void
    {
        $this->state = $this->hasQuarterState;
    }

    public function ejectQuarter(): void
    {
        $this->state->ejectQuarter();
    }

    public function insertQuarter(): void
    {
        $this->state->insertQuarter();
    }

    public function turnCrank(): void
    {
        $this->state->turnCrank();
        $this->state->dispense();
    }

    public function toString(): string
    {
        $str = $this->getStringTemplate();
        $postfix = ($this->count != 1 ? 's' : '');
        return sprintf($str, $this->count, $postfix, $this->state->ToString());
    }

    private function getStringTemplate(): string
    {
        return <<<EOF
Mighty Gumball, Inc.
PHP-enabled Standing Gumball Model #2019 (with state)
Inventory: %d gumball%s
Machine is %s
EOF;
    }
}
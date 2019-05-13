<?php

namespace GumballMachine;

class GumballMachine implements GumballMachineInterface
{
    /** @var GumballMachineContextInterface */
    private $context;

    public function __construct(int $count)
    {
        $this->context = new GumballMachineContext($count);
    }

    public function getBallCount(): int
    {
        return $this->context->getBallCount();
    }

    public function getQuarterCount(): int
    {
        return $this->context->getQuarterCount();
    }

    public function insertQuarter(): void
    {
        $this->context->insertQuarter();
    }

    public function ejectQuarter(): void
    {
        $this->context->ejectQuarter();
    }

    public function turnCrank(): void
    {
        $this->context->turnCrank();
    }

    public function refillBall(int $numBalls): void
    {
        $this->context->refillBall($numBalls);
    }

    public function toString(): string
    {
        return $this->context->toString();
    }
}
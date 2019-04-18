<?php

namespace GumballMachine;

class GumballMachine
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

    public function toString(): string
    {
        return $this->context->toString();
    }
}
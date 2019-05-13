<?php

namespace Command;

use GumballMachine\GumballMachine;

class TurnCrankCommand implements CommandInterface
{
    public const COMMAND_NAME = 'turn_crank';
    /** @var GumballMachine */
    private $gm;

    public function __construct(GumballMachine $gm)
    {
        $this->gm = $gm;
    }
    public function execute(array $commandArgs): void
    {
        $this->gm->turnCrank();
    }
}
<?php

namespace Command;

use GumballMachine\GumballMachineInterface;

class TurnCrankCommand implements CommandInterface
{
    public const COMMAND_NAME = 'turn_crank';
    /** @var GumballMachineInterface */
    private $gm;

    public function __construct(GumballMachineInterface $gm)
    {
        $this->gm = $gm;
    }
    public function execute(array $commandArgs): void
    {
        $this->gm->turnCrank();
    }
}
<?php

namespace Command;

use GumballMachine\GumballMachineInterface;

class EjectQuarterCommand implements CommandInterface
{
    public const COMMAND_NAME = 'eject_quarter';
    /** @var GumballMachineInterface */
    private $gm;

    public function __construct(GumballMachineInterface $gm)
    {
        $this->gm = $gm;
    }

    public function execute(array $commandArgs): void
    {
        $this->gm->ejectQuarter();
    }
}

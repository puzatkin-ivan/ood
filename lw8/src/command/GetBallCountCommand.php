<?php

namespace Command;

use GumballMachine\GumballMachineInterface;

class GetBallCountCommand implements CommandInterface
{
    public const COMMAND_NAME = 'get_ball_count';
    /** @var GumballMachineInterface */
    private $gumballMachine;

    public function __construct(GumballMachineInterface $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function execute(array $commandArgs): void
    {
        echo $this->gumballMachine->getBallCount() . PHP_EOL;
    }
}
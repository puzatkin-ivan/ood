<?php

namespace Command;

use Command\Exception\CommandInvalidArgumentException;
use GumballMachine\GumballMachineInterface;

class RefillBallCommand implements CommandInterface
{
    public const COMMAND_NAME = 'refill_ball';

    const COMMAND_ARGS_COUNT = 2;
    /** @var GumballMachineInterface */
    private $gm;

    public function __construct(GumballMachineInterface $gm)
    {
        $this->gm = $gm;
    }

    /**
     * @param array $commandArgs
     * @throws CommandInvalidArgumentException
     */
    public function execute(array $commandArgs): void
    {
        if (count($commandArgs) != self::COMMAND_ARGS_COUNT)
        {
            throw new CommandInvalidArgumentException('Invalid argument count');
        }
        $this->gm->refillBall($commandArgs[1]);
    }
}
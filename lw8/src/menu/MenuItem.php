<?php

namespace Menu;

use Command\CommandInterface;

class MenuItem
{
    /** @var string */
    private $commandName;
    /** @var CommandInterface */
    private $command;
    /** @var string */
    private $description;

    public function __construct(string $commandName, CommandInterface $command, string $description)
    {
        $this->commandName = $commandName;
        $this->command = $command;
        $this->description = $description;
    }

    public function getCommandName(): string
    {
        return $this->commandName;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function execute(array $commandArgs): void
    {
        $this->command->execute($commandArgs);
    }
}
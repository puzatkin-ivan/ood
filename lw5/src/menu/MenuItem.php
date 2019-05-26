<?php

namespace Menu;

class MenuItem
{
    /** @var string */
    private $commandName;
    /** @var string */
    private $description;
    /** @var callable */
    private $command;

    public function __construct(string $name, string $description, callable $command)
    {
        $this->commandName = $name;
        $this->description = $description;
        $this->command = $command;
    }

    public function getCommandName(): string
    {
        return $this->commandName;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function execute(string $command): void
    {
        call_user_func($this->command, $command);
    }
}
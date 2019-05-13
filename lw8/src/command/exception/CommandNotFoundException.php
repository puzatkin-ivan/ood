<?php

namespace Command\Exception;

class CommandNotFoundException extends CommandException
{
    public function __construct(string $commandName = "")
    {
        parent::__construct('Error: Command ' . $commandName . ' not found.');
    }
}
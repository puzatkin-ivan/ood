<?php

namespace Menu;

use Command\Exception\CommandNotFoundException;

class Menu
{
    /** @var MenuItem[] */
    private $commandMap;

    /**
     * Menu constructor.
     */
    public function __construct()
    {
        $this->commandMap = [];
    }

    /**
     * @param string $name
     * @param string $description
     * @param callable $callback
     */
    public function addItem(string $name, string $description, callable $callback): void
    {
        $menuItem = new MenuItem($name, $description, $callback);
        $this->commandMap[$menuItem->getCommandName()] = $menuItem;
    }

    public function getCommands(): array
    {
        return $this->commandMap;
    }

    /**
     * @param string $commandName
     * @param array $commandStr
     * @throws CommandNotFoundException
     */
    public function executeCommand(string $commandName, string $commandStr): void
    {
        if (!isset($this->commandMap[$commandName]))
        {
            throw new CommandNotFoundException('Unknown command ' . $commandName);
        }
        $item = $this->commandMap[$commandName];
        $item->execute($commandStr);
    }
}

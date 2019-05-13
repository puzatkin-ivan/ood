<?php

namespace Menu;

use Command\CommandInterface;
use Command\Exception\CommandNotFoundException;
use GumballMachine\GumballMachineInterface;

class Menu implements MenuInterface
{
    /** @var GumballMachineInterface */
    private $gumballMachine;
    /** @var MenuItem[]*/
    private $menuItems;
    /** @var bool */
    private $isExit;

    public function __construct(GumballMachineInterface $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
        $this->isExit = false;
    }

    public function getGumballMachine(): GumballMachineInterface
    {
        return $this->gumballMachine;
    }

    public function addItem(string $name, CommandInterface $command, string $description): void
    {
        $this->menuItems[$name] = new MenuItem($name, $command, $description);
    }

    /**
     * @param string $args
     * @throws CommandNotFoundException
     */
    public function execute(string $args): void
    {
        $commandStr = $this->removeExtraSpaces($args);
        $commandArgs = explode(' ', $commandStr);
        $item = $this->getItem($commandArgs[0]);

        $item->execute($commandArgs);
    }

    /**
     * @param string $commandName
     * @return MenuItem
     * @throws CommandNotFoundException
     */
    public function getItem(string $commandName): MenuItem
    {
        if (!isset($this->menuItems[$commandName]))
        {
            throw new CommandNotFoundException($commandName);
        }
        return $this->menuItems[$commandName];
    }

    public function getItems(): array
    {
        return $this->menuItems;
    }

    public function isExit(): bool
    {
        return $this->isExit;
    }

    public function exit(): void
    {
        $this->isExit = true;
    }

    public function showInstructions(): string
    {
        $result = 'List command:' . PHP_EOL;
        foreach ($this->menuItems as $menuItem)
        {
            $result .='- ' . $menuItem->getCommandName() . ': ' . $menuItem->getDescription() . PHP_EOL;
        }

        return $result;
    }

    private function removeExtraSpaces(string $line): string
    {
        return preg_replace('/^ +| +$|( ) +/m', '$1', $line);
    }
}
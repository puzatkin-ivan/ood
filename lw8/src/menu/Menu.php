<?php

namespace Menu;

use Command\CommandInterface;
use Command\Exception\CommandException;
use Command\Exception\CommandNotFoundException;
use GumballMachine\GumballMachineInterface;

class Menu
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
    }

    public function getGumballMachine(): GumballMachineInterface
    {
        return $this->gumballMachine;
    }

    public function addItem(string $name, CommandInterface $command, string $description): void
    {
        $this->menuItems[$name] = new MenuItem($name, $command, $description);
    }

    public function execute(): void
    {
        $this->isExit = false;

        while (!$this->isExit)
        {
            try
            {
                $commandName = readline('> ');
                $commandStr = $this->removeExtraSpaces($commandName);
                $commandArgs = explode(' ', $commandStr);
                $item = $this->getItem($commandArgs);

                $item->execute($commandArgs);
            }
            catch (CommandException $exception)
            {
                echo $exception->getMessage() . PHP_EOL;
                $this->showInstructions();
            }
        }
    }

    /**
     * @param array $commandArgs
     * @return MenuItem
     * @throws CommandNotFoundException
     */
    public function getItem(array $commandArgs): MenuItem
    {
        if (!isset($this->menuItems[$commandArgs[0]]))
        {
            throw new CommandNotFoundException($commandArgs[0]);
        }
        return $this->menuItems[$commandArgs[0]];
    }

    public function gate(): void
    {
        $this->isExit = true;
    }

    private function showInstructions(): void
    {
        echo 'List command:' . PHP_EOL;
        foreach ($this->menuItems as $menuItem)
        {
            echo '- ' . $menuItem->getCommandName() . ': ' . $menuItem->getDescription();
        }
    }

    private function removeExtraSpaces(string $line): string
    {
        return preg_replace('/^ +| +$|( ) +/m', '$1', $line);
    }
}
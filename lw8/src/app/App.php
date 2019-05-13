<?php

namespace App;

use Command\EjectQuarterCommand;
use Command\Exception\CommandException;
use Command\ExitCommand;
use Command\GetBallCountCommand;
use Command\GetQuarterCountCommand;
use Command\InsertQuarterCommand;
use Command\RefillBallCommand;
use Command\TurnCrankCommand;
use GumballMachine\GumballMachine;
use Menu\Menu;

class App
{
    public function run(): void
    {
        $gm = new GumballMachine(10);

        echo $gm->toString() . PHP_EOL;

        $gm->insertQuarter();
        $gm->turnCrank();

        echo $gm->toString() . PHP_EOL;

        $gm->insertQuarter();
        $gm->ejectQuarter();
        $gm->turnCrank();

        echo $gm->toString() . PHP_EOL;

        $gm->insertQuarter();
        $gm->turnCrank();
        $gm->insertQuarter();
        $gm->turnCrank();
        $gm->ejectQuarter();

        echo $gm->toString() . PHP_EOL;

        $gm->insertQuarter();
        $gm->insertQuarter();
        $gm->turnCrank();
        $gm->insertQuarter();
        $gm->turnCrank();
        $gm->insertQuarter();
        $gm->turnCrank();

        echo $gm->toString() . PHP_EOL;
    }

    public function runWithMenu(): void
    {
        $menu = new Menu(new GumballMachine(0));
        $this->addCommandInMenu($menu);
        
        while (!$menu->isExit())
        {
            try
            {
                $commandStr = readline('> ');
                $menu->execute($commandStr);
            }
            catch (CommandException $exception)
            {
                echo $exception->getMessage() . PHP_EOL;
                echo $menu->showInstructions();
            }
        }
    }

    private function addCommandInMenu(Menu $menu): void
    {
        $menu->addItem(ExitCommand::COMMAND_NAME, new ExitCommand($menu), 'Exit application');
        $menu->addItem(InsertQuarterCommand::COMMAND_NAME, new InsertQuarterCommand($menu->getGumballMachine()), 'Insert quarter in gumball machine');
        $menu->addItem(TurnCrankCommand::COMMAND_NAME, new TurnCrankCommand($menu->getGumballMachine()), 'Insert quarter in gumball machine');
        $menu->addItem(EjectQuarterCommand::COMMAND_NAME, new EjectQuarterCommand($menu->getGumballMachine()), 'Insert quarter in gumball machine');
        $menu->addItem(RefillBallCommand::COMMAND_NAME, new RefillBallCommand($menu->getGumballMachine()), 'Insert quarter in gumball machine');
        $menu->addItem(GetQuarterCountCommand::COMMAND_NAME, new GetQuarterCountCommand($menu->getGumballMachine()), 'Print quarter count');
        $menu->addItem(GetBallCountCommand::COMMAND_NAME, new GetBallCountCommand($menu->getGumballMachine()), 'Print ball count');
    }
}
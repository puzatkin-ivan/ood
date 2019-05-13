<?php

namespace Menu;

use Command\Exception\CommandNotFoundException;
use Command\ExitCommand;
use Command\InsertQuarterCommand;
use GumballMachine\GumballMachine;
use PHPUnit\Framework\TestCase;

class MenuTest extends TestCase
{
    public function testAddItem(): void
    {
        $gm = new GumballMachine(1);
        $menu = new Menu($gm);
        $menu->addItem(ExitCommand::COMMAND_NAME, new ExitCommand($menu), 'Exit application');

        try
        {
            $this->assertEquals(count($menu->getItems()), 1);
            $menuItem = $menu->getItem(ExitCommand::COMMAND_NAME);
            $this->assertTrue(isset($menuItem));
        }
        catch (\Exception $exception)
        {
            $this->fail($exception->getMessage());
        }
    }

    public function testExecuteUnknownCommand(): void
    {
        $gm = new GumballMachine(1);
        $menu = new Menu($gm);
        $menu->addItem(ExitCommand::COMMAND_NAME, new ExitCommand($menu), 'Exit application');

        try
        {
            $menu->execute(InsertQuarterCommand::COMMAND_NAME);
            $this->fail();
        }
        catch (CommandNotFoundException $exception)
        {
            $this->assertTrue(true);
        }
    }

    public function testExecuteCommand(): void
    {
        $gm = new GumballMachine(1);
        $menu = new Menu($gm);
        $menu->addItem(ExitCommand::COMMAND_NAME, new ExitCommand($menu), 'Exit application');

        try
        {
            $menu->execute(ExitCommand::COMMAND_NAME);
            $this->assertTrue($menu->isExit());
        }
        catch (\Exception $ex)
        {
            $this->fail();
        }
    }
}
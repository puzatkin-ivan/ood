<?php

namespace Menu;

use Command\CommandInterface;
use GumballMachine\GumballMachineInterface;

interface MenuInterface
{
    public function getGumballMachine(): GumballMachineInterface;
    public function addItem(string $commandName, CommandInterface $command, string $description): void;
    public function getItem(string $name): MenuItem;
    public function getItems(): array;
    public function execute(string $args): void;
    public function exit(): void;
    public function isExit(): bool;
    public function showInstructions(): string;
}
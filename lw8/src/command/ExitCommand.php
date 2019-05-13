<?php

namespace Command;

use Menu\Menu;

class ExitCommand implements CommandInterface
{
    public const COMMAND_NAME = 'exit';
    /** @var Menu */
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function execute(array $commandArgs): void
    {
        $this->menu->gate();
    }
}
<?php

namespace Command;

use Menu\MenuInterface;

class ExitCommand implements CommandInterface
{
    public const COMMAND_NAME = 'exit';
    /** @var MenuInterface */
    private $menu;

    public function __construct(MenuInterface $menu)
    {
        $this->menu = $menu;
    }

    public function execute(array $commandArgs): void
    {
        $this->menu->exit();
    }
}
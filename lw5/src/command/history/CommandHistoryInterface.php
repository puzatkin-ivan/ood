<?php

namespace Command\History;

use Command\CommandInterface;
use Command\History\Exception\CommandHistoryException;

interface CommandHistoryInterface
{
    public function addCommand(CommandInterface $command): void;

    public function canUndo(): bool;

    /**
     * @throws CommandHistoryException
     */
    public function undo(): void;

    public function canRedo(): bool;

    /**
     * @throws CommandHistoryException
     */
    public function redo(): void;
}
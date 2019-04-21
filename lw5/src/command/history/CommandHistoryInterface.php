<?php

namespace Command;

interface CommandHistoryInterface
{
    public function addCommand(CommandInterface $command): void;

    public function canUndo(): bool;

    public function undo(): void;

    public function canRedo(): bool;

    public function redo(): void;
}
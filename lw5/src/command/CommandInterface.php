<?php

namespace Command;

interface CommandInterface
{
    public function execute(): void;
    public function unexecute(): void;
}
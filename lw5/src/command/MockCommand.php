<?php


namespace Command;

class MockCommand implements CommandInterface
{
    public const CREATED = 0;
    public const EXECUTED = 1;
    public const CANCELED= 2;

    private $state = self::CREATED;

    public function getState(): int
    {
        return $this->state;
    }

    public function execute(): void
    {
        $this->state = self::EXECUTED;
    }

    public function unexecute(): void
    {
        $this->state = self::CANCELED;
    }
}
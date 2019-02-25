<?php

class Follower implements ObserverInterface
{
    /** @var ObserverInterface */
    private $observer;
    /** @var int */
    private $priority;

    public function __construct(ObserverInterface $observer, int $priority)
    {
        $this->observer = $observer;
        $this->priority = $priority;
    }

    public function getUid(): string
    {
        return $this->observer->getUid();
    }

    public function update(ObservableInterface $observable): void
    {
        $this->observer->update($observable);
    }

    public function getPriority(): int
    {
        return $this->priority;
    }
}
<?php

class ObserverMock implements ObserverInterface
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function update(ObservableInterface $observable): void
    {
        echo $this->name . PHP_EOL;
        $observable->removeObservers($this);
    }
}
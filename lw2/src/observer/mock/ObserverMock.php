<?php

class ObserverMock extends Entity implements ObserverInterface
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        parent::__construct();
    }

    public function update(ObservableInterface $observable): void
    {
        echo $this->name . PHP_EOL;
        $observable->removeObservers($this);
    }
}
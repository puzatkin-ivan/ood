<?php

abstract class Duck
{
    /** @var IFlyBehavior */
    private $flyBehavior;
    /** @var IQuackBehavior */
    private $quackBehavior;
    /** @var IDanceBehavior */
    private $danceBehavior;

    public function __construct(IFlyBehavior $flyBehavior,
                                IQuackBehavior $quackBehavior,
                                IDanceBehavior $danceBehavior)
    {
        $this->flyBehavior = $flyBehavior;
        $this->quackBehavior = $quackBehavior;
        $this->danceBehavior = $danceBehavior;
    }

    public function quack(): void
    {
        $this->quackBehavior->quack();
    }

    public function swim(): void
    {
        echo 'I\'m swimming' . PHP_EOL;
    }

    public function fly(): void
    {
        $this->flyBehavior->fly();
    }

    public function dance(): void
    {
        $this->danceBehavior->dance();
    }

    public function setFlyBehavior(IFlyBehavior $flyBehavior)
    {
        $this->flyBehavior = $flyBehavior;
    }

    abstract public function display(): void;
}
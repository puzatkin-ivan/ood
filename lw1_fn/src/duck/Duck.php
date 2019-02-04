<?php

abstract class Duck
{
    /** @var Closure */
    private $flyBehavior;
    /** @var Closure */
    private $quackBehavior;
    /** @var Closure */
    private $danceBehavior;

    public function __construct(callable $flyBehavior,
                                callable $quackBehavior,
                                callable $danceBehavior)
    {
        $this->flyBehavior = $flyBehavior;
        $this->quackBehavior = $quackBehavior;
        $this->danceBehavior = $danceBehavior;
    }

    public function quack(): void
    {
        call_user_func($this->quackBehavior);
    }

    public function swim(): void
    {
        echo 'I\'m swimming' . PHP_EOL;
    }

    public function fly(): void
    {
        call_user_func($this->flyBehavior);
    }

    public function dance(): void
    {
        call_user_func($this->danceBehavior);
    }

    public function setFlyBehavior(callable $flyBehavior)
    {
        $this->flyBehavior = $flyBehavior;
    }

    abstract public function display(): void;
}
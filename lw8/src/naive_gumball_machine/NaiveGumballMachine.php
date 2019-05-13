<?php

namespace NaiveGumballMachine;

use NaiveGumballMachine\State\StateEnum;

class NaiveGumballMachine
{
    /** @var int */
    private $state;
    /** @var int */
    private $ballCount;
    /** @var int */
    private $quarterCount;

    public function __construct(int $ballCount)
    {
        $this->ballCount = $ballCount;
        $this->quarterCount = 0;
        $this->state = ($this->ballCount > 0) ? StateEnum::NO_QUARTER : StateEnum::SOLD_OUT;
    }

    public function getBallCount(): int
    {
        return $this->ballCount;
    }

    public function insertQuarter(): void
    {
        switch ($this->state)
        {
            case StateEnum::SOLD_OUT:
                echo "You can't insert a quarter, the machine is sold out" . PHP_EOL;
                break;
            case StateEnum::NO_QUARTER:
                echo "You inserted a quarter" . PHP_EOL;
                $this->state = StateEnum::HAS_QUARTER;
                break;
            case StateEnum::HAS_QUARTER:
                $this->addQuarter();
                echo "You inserted a quarter" . PHP_EOL;
                break;
            case StateEnum::SOLD:
                echo "Please wait, we're already giving you a gumball" . PHP_EOL;
                break;
        }
    }

    public function ejectQuarter(): void
    {
        switch ($this->state)
        {
            case StateEnum::SOLD_OUT:
                echo "You can't eject, you haven't inserted a quarter yet" . PHP_EOL;
                break;
            case StateEnum::NO_QUARTER:
                echo "You haven't inserted a quarter" . PHP_EOL;
                break;
            case StateEnum::HAS_QUARTER:
                $this->quarterCount = 0;
                echo "Quarter returned" . PHP_EOL;
                $this->state = StateEnum::NO_QUARTER;
                break;
            case StateEnum::SOLD:
                echo "Please wait, we're already giving you a gumball" . PHP_EOL;
                break;
        }
    }

    public function turnCrank(): void
    {
        switch ($this->state)
        {
            case StateEnum::SOLD_OUT:
                echo "You turned but there's no gumballs" . PHP_EOL;
                break;
            case StateEnum::NO_QUARTER:
                echo "You turned but there's no quarter" . PHP_EOL;
                break;
            case StateEnum::HAS_QUARTER:
                echo "You turned..." . PHP_EOL;
                $this->state = StateEnum::SOLD;
                break;
            case StateEnum::SOLD:
                echo "Turning twice doesn't get you another gumball" . PHP_EOL;
                break;
        }
        $this->dispense();
    }

    public function refill(int $numBalls): void
    {
        $this->ballCount = $numBalls;
        $this->state = $numBalls > 0 ? StateEnum::NO_QUARTER : StateEnum::SOLD_OUT;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString(): string
    {
        $state = $this->stateToString();
        $str = $this->getStringTemplate();
        $postfix = ($this->ballCount != 1 ? 's' : '');
        return sprintf($str, $this->ballCount, $postfix, $state);
    }

    private function getStringTemplate(): string
    {
        return <<<EOF
Mighty Gumball, Inc.
PHP-enabled Standing Gumball Model #2019 (with state)
Inventory: %d gumball%s
Machine is %s
EOF;
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function stateToString(): string
    {
        switch ($this->state)
        {
            case StateEnum::SOLD_OUT:
                return 'sold out';
            case StateEnum::NO_QUARTER:
                return 'waiting for quarter';
            case StateEnum::HAS_QUARTER:
                return 'waiting for turn of crank';
            case StateEnum::SOLD:
                return 'delivering a gumball';
            default:
                throw new \Exception("Unknown state");
        }
    }

    private function dispense(): void
    {
        switch ($this->state)
        {
            case StateEnum::SOLD:
                echo 'A gumball comes rolling out the slot...' . PHP_EOL;
                --$this->ballCount;
                if ($this->ballCount == 0)
                {
                    echo 'Oops, out of gumballs' . PHP_EOL;
                    $this->resetQuarters();
                    $this->state = StateEnum::SOLD_OUT;
                }
                else
                {
                    $this->state = StateEnum::NO_QUARTER;
                }
                break;
            case StateEnum::NO_QUARTER:
                echo "You need to pay first" . PHP_EOL;
                break;
            case StateEnum::SOLD_OUT:
            case StateEnum::HAS_QUARTER:
                echo "No gumball dispensed" . PHP_EOL;
                break;

        }
    }

    private function resetQuarters(): void
    {
        if ($this->quarterCount != 0)
        {
            echo "Reset {$this->quarterCount} quarter" . PHP_EOL;
            $this->quarterCount = 0;
        }
    }

    private function addQuarter(): void
    {
        if ($this->quarterCount == 5)
        {
            throw new \OutOfRangeException("Gumball machine can hold up to 5 quarter.");
        }
        ++$this->quarterCount;
    }
}
<?php

namespace State;

interface StateInterface
{
    public function insertQuarter(): void;
    public function ejectQuarter(): void;
    public function turnCrank(): void;
    public function dispense(): void;
    public function refillBall(int $numBalls): void;
    public function toString(): string;
}

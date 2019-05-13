<?php

namespace GumballMachine;

interface GumballMachineInterface
{
    public function getBallCount(): int;
    public function getQuarterCount(): int;
    public function insertQuarter(): void;
    public function ejectQuarter(): void;
    public function turnCrank(): void;
    public function refillBall(int $numBalls): void;
    public function toString(): string;
}
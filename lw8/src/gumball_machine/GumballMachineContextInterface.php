<?php

namespace GumballMachine;


interface GumballMachineContextInterface
{
    public function releaseBall(): void;
    public function getQuarterCount(): int;
    public function getBallCount(): int;

    public function ejectQuarter(): void;
    public function insertQuarter(): void;
    public function turnCrank(): void;
    public function refillBall(int $numBalls): void;

    public function setSoldOutState(): void;
    public function setNoQuarterState(): void;
    public function setSoldState(): void;
    public function setHasQuarterState(): void;
    public function addQuarter(): void;
    public function resetQuarters(): void;

    public function addBall(int $numBalls): void;
}

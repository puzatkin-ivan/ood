<?php

namespace GumballMachine;


interface GumballMachineContextInterface
{
    public function releaseBall(): void;
    public function getQuarterCount(): int;
    public function getBallCount(): int;
    public function setSoldOutState(): void;
    public function setNoQuarterState(): void;
    public function setSoldState(): void;
    public function setHasQuarterState(): void;
    public function addQuarter(): void;
    public function resetQuarters(): void;
}

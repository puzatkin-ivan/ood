<?php

namespace GumballMachine;


interface GumballMachineContextInterface
{
    public function releaseBall(): void;
    public function getBallCount(): int;
    public function setSoldOutState(): void;
    public function setNoQuarterState(): void;
    public function setSoldState(): void;
    public function setHasQuarterState(): void;
}

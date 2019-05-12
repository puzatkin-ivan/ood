<?php

namespace App;

use GumballMachine\GumballMachine;

class App
{
    public function run(): void
    {
        $gm = new GumballMachine(10);

        echo $gm->toString() . PHP_EOL;

        $gm->insertQuarter();
        $gm->turnCrank();

        echo $gm->toString() . PHP_EOL;

        $gm->insertQuarter();
        $gm->ejectQuarter();
        $gm->turnCrank();

        echo $gm->toString() . PHP_EOL;

        $gm->insertQuarter();
        $gm->turnCrank();
        $gm->insertQuarter();
        $gm->turnCrank();
        $gm->ejectQuarter();

        echo $gm->toString() . PHP_EOL;

        $gm->insertQuarter();
        $gm->insertQuarter();
        $gm->turnCrank();
        $gm->insertQuarter();
        $gm->turnCrank();
        $gm->insertQuarter();
        $gm->turnCrank();

        echo $gm->toString() . PHP_EOL;
    }
}
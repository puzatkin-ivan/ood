<?php

namespace FlyBehavior
{
    function getFlyNoWay(): callable
    {
        return function () {};
    }
    function getFlyWithWings(): callable
    {
        $flightCount = 0;
        return function () use (&$flightCount) {
            ++$flightCount;
            echo 'Flight ' . $flightCount . ' I\'m flying with wings!'  . PHP_EOL;
        };
    }
}
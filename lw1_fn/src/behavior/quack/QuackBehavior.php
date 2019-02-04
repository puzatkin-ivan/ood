<?php

namespace QuackBehavior
{
    function getQuackBehavior(): callable
    {
        return function() {
            echo 'Quack!'  . PHP_EOL;
        };
    }

    function getSqueakBehavior(): callable
    {
        return function() {
            echo 'Squeak!' . PHP_EOL;
        };
    }

    function getMuteQuackBehavior(): callable
    {
        return function() {};
    }
}
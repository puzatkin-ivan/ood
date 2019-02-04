<?php

namespace DanceBehavior
{
    function getWaltzDanceBehavior(): callable
    {
        return function() {
            echo 'I\'m dancing waltz.' . PHP_EOL;
        };
    }

    function getMinuetDanceBehavior(): callable
    {
        return function() {
            echo 'I\'m dancing minuet.' . PHP_EOL;
        };
    }

    function getNoDanceBehavior(): callable
    {
        return function() {};
    }
}
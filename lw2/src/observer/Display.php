<?php

class Display implements ObserverInterface
{
    public function update(WeatherInfo $info): void
    {
        echo 'Current Temp ' . $info->temperature . PHP_EOL;
        echo 'Current Hum ' . $info->humidity . PHP_EOL;
        echo 'Current Pressure ' . $info->pressure . PHP_EOL;
        echo '----------------' . PHP_EOL;
    }
}
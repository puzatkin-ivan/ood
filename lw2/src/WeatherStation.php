<?php

class WeatherStation
{
    public function run()
    {
        $wd = new WeatherData();

        $display = new Display();
        $wd->registerObserver($display, 1);

        $statsTemp = new StatsDisplay();
        $wd->registerObserver($statsTemp, 2);

        $wd->setMeasurements(3, 0.7, 760);
        $wd->setMeasurements(4, 0.8, 761);
        $wd->setMeasurements(15, 0.5, 745);
    }
}
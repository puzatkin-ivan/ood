<?php

class WeatherStation
{
    public function run()
    {
        $wd = new WeatherData();
        $wdInternal = new WeatherData();

        $display = new Display($wdInternal, $wd);
        $wd->registerObserver($display, 1);
        $wdInternal->registerObserver($display, 2);

        $statsTemp = new StatsDisplay($wdInternal, $wd);
        $wd->registerObserver($statsTemp, 2);
        $wdInternal->registerObserver($statsTemp, 1);

        $wd->setMeasurements(3, 0.7, 760, 10, 32);
        $wdInternal->setMeasurements(23, 0.3, 751, 5, 12);
        $wd->setMeasurements(15, 0.5, 745, 12, 12);
        $wdInternal->setMeasurements(21, 0.7, 750, 12, 32);
        $wd->setMeasurements(20, 0.8, 765, 1, 25);
        $wdInternal->setMeasurements(25, 0.4, 766, 2, 21);
    }
}
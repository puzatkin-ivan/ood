<?php

class WeatherStation
{
    public function run()
    {
        $wd = new WeatherData();

        $display = new Display();
        $wd->registerObserver($display);

        $statsTemp = new StatsDisplay('temperature', function(WeatherInfo $info) {
           return $info->temperature;
        });
        $wd->registerObserver($statsTemp);

        $statsHum = new StatsDisplay('humidity', function(WeatherInfo $info) {
           return $info->humidity;
        });
        $wd->registerObserver($statsHum);

        $statsPressure = new StatsDisplay('pressure', function(WeatherInfo $info) {
            return $info->pressure;
        });
        $wd->registerObserver($statsPressure);

        $wd->setMeasurements(3, 0.7, 760);
        $wd->setMeasurements(4, 0.8, 761);
        $wd->setMeasurements(15, 0.5, 745);
    }
}
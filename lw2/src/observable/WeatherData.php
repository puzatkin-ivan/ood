<?php

class WeatherData extends Observable
{
    /** @var float */
    private $temperature = 0.0;
    /** @var float */
    private $humidity = 0.0;
    /** @var float */
    private $pressure = 760.0;

    public function setMeasurements(float $temp, float $humidity, float $pressure): void
    {
        $this->temperature = $temp;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }

    public function measurementsChanged()
    {
        $this->notifyObservers();
    }

    protected function getChangedData(): WeatherInfo
    {
        $info = new WeatherInfo();
        $info->temperature = $this->temperature;
        $info->humidity = $this->humidity;
        $info->pressure = $this->pressure;
        return $info;
    }
}
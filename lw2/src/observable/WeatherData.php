<?php

class WeatherData extends Observable
{
    public const EXTERNAL_SENSORS = 1;
    public const INTERNAL_SENSORS = 2;

    /** @var float */
    private $temperature = 0.0;
    /** @var float */
    private $humidity = 0.0;
    /** @var float */
    private $pressure = 760.0;
    /** @var int */
    private $sensorType;

    public function __construct(?int $sensorType = WeatherData::INTERNAL_SENSORS)
    {
        $this->sensorType = $sensorType;
    }

    public function getSensorType(): int
    {
        return $this->sensorType;
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getHumidity(): float
    {
        return $this->humidity;
    }

    public function getPressure(): float
    {
        return $this->pressure;
    }

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
}
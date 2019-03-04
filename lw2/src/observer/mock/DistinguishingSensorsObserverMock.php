<?php

class DistinguishingSensorsObserverMock extends Entity implements ObserverInterface
{
    /**
     * @param WeatherData $observable
     */
    public function update(ObservableInterface $observable): void
    {
        echo ' ' . ($observable->getSensorType() == WeatherData::EXTERNAL_SENSORS ? 'external' : 'internal') ;
    }
}
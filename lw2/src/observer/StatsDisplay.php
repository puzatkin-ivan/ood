<?php

class StatsDisplay implements ObserverInterface
{
    public function __construct()
    {
    }

    /**
     * @param ObservableInterface|WeatherData $observable
     */
    public function update(ObservableInterface $observable): void
    {
    }
}
<?php

class Display extends Entity implements ObserverInterface
{
    /**
     * @param ObservableInterface|WeatherData $observable
     */
    public function update(ObservableInterface $observable): void
    {
        echo 'Current Temp ' . $observable->getTemperature() . PHP_EOL;
        echo 'Current Hum ' . $observable->getHumidity() . PHP_EOL;
        echo 'Current Pressure ' . $observable->getPressure() . PHP_EOL;
        echo '----------------' . PHP_EOL;
    }
}
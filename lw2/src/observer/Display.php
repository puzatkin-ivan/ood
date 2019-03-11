<?php

class Display extends Entity implements ObserverInterface
{
    /** @var WeatherData */
    private $inWeatherData;
    /** @var WeatherData */
    private $outWeatherData;

    public function __construct(WeatherData &$in, WeatherData &$out)
    {
        parent::__construct();
        $this->inWeatherData = $in;
        $this->outWeatherData = $out;
    }
    /**
     * @param ObservableInterface|WeatherData $observable
     */
    public function update(ObservableInterface $observable): void
    {
        $sensorType = ($this->inWeatherData === $observable);

        echo 'Type Sensors: ' . $sensorType ? 'internal' : 'external' . PHP_EOL;
        echo 'Type Sensors: ' . $sensorType . PHP_EOL;
        echo 'Current Temp ' . $observable->getTemperature() . PHP_EOL;
        echo 'Current Hum ' . $observable->getHumidity() . PHP_EOL;
        echo 'Current Pressure ' . $observable->getPressure() . PHP_EOL;
        echo '----------------' . PHP_EOL;
    }
}
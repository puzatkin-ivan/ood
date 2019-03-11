<?php

class StatsDisplay extends Entity implements ObserverInterface
{
    /** @var Sensors */
    private $inSensors;
    /** @var Sensors */
    private $outSensors;
    /** @var WeatherData */
    private $inWeatherData;
    /** @var WeatherData */
    private $outWeatherData;

    public function __construct(WeatherData &$in, WeatherData &$out)
    {
        parent::__construct();
        $this->inSensors = new Sensors();
        $this->outSensors = new Sensors();
        $this->inWeatherData = $in;
        $this->outWeatherData = $out;
    }

    /**
     * @param ObservableInterface|WeatherData $observable
     */
    public function update(ObservableInterface $observable): void
    {
        $isInternalSensors = ($this->inWeatherData === $observable);
        if ($isInternalSensors)
        {
            $this->processInternalSensors($observable);
        }
        else
        {
            $this->processExternalSensors($observable);
        }
    }

    /**
     * @param ObservableInterface|WeatherData $observable
     */
    private function processInternalSensors(ObservableInterface $observable): void
    {
        $this->inSensors->tempCalculator->update($observable->getTemperature());
        $this->inSensors->humidityCalculator->update($observable->getHumidity());
        $this->inSensors->pressureCalculator->update($observable->getPressure());
        $this->inSensors->windSpeedCalculator->update($observable->getWindSpeed());
        $this->inSensors->windDirectionCalculator->update($observable->getWindDirection());

        $this->showChanges($this->inSensors, 'internal');
    }

    /**
     * @param ObservableInterface|WeatherData $observable
     */
    private function processExternalSensors(ObservableInterface $observable): void
    {
        $this->outSensors->tempCalculator->update($observable->getTemperature());
        $this->outSensors->humidityCalculator->update($observable->getHumidity());
        $this->outSensors->pressureCalculator->update($observable->getPressure());
        $this->outSensors->windSpeedCalculator->update($observable->getWindSpeed());
        $this->outSensors->windDirectionCalculator->update($observable->getWindDirection());

        $this->showChanges($this->outSensors, 'external');
    }

    private function showChanges(Sensors $sensors, string $sensorsType): void
    {
        echo 'Type of sensors: '. $sensorsType . PHP_EOL;
        echo $this->showChange($sensors->tempCalculator) . PHP_EOL;
        echo $this->showChange($sensors->humidityCalculator) . PHP_EOL;
        echo $this->showChange($sensors->pressureCalculator) . PHP_EOL;
        echo $this->showChange($sensors->windSpeedCalculator) . PHP_EOL;
        echo 'Wind Direction: ' . $sensors->windDirectionCalculator->getDirection() . PHP_EOL;
    }


    private function showChange(StatsCalculator $calculator): string
    {
        $type = $calculator->getType();
        $max = $calculator->getMax();
        $min = $calculator->getMin();
        $average = $calculator->getAverage();
        $result = 'Max ' . $type . ' ' . round($max, 3) . PHP_EOL;
        $result .= 'Min ' . $type . ' ' . round($min, 3) . PHP_EOL;
        $result .= 'Average ' . $type . ' ' . round($average, 3) . PHP_EOL;
        $result .= '----------------';
        return $result;
    }
}
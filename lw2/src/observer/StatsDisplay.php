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
            $this->processSensors($this->inSensors, $observable, 'internal');
        }
        else
        {
            $this->processSensors($this->outSensors, $observable, 'external');
        }
    }

    /**
     * @param ObservableInterface|WeatherData $observable
     */
    private function processSensors(Sensors $sensors, ObservableInterface $observable, string $sensorsType): void
    {
        $this->updateSensors($sensors, $observable);

        $this->showChanges($sensors, $sensorsType);
    }

    /**
     * @param Sensors $sensors
     * @param ObserverInterface|WeatherData $observable
     */
    private function updateSensors(Sensors $sensors, ObserverInterface $observable): void
    {
        $sensors->tempCalculator->update($observable->getTemperature());
        $sensors->humidityCalculator->update($observable->getHumidity());
        $sensors->pressureCalculator->update($observable->getPressure());
        $sensors->windSpeedCalculator->update($observable->getWindSpeed());
        $sensors->windDirectionCalculator->update($observable->getWindDirection());
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
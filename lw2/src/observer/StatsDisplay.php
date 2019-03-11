<?php

class StatsDisplay extends Entity implements ObserverInterface
{
    /** @var StatsCalculator */
    private $inTempCalculator;
    /** @var StatsCalculator */
    private $inHumidityCalculator;
    /** @var StatsCalculator */
    private $inPressureCalculator;
    /** @var StatsCalculator */
    private $outTempCalculator;
    /** @var StatsCalculator */
    private $outHumidityCalculator;
    /** @var StatsCalculator */
    private $outPressureCalculator;
    /** @var WeatherData */
    private $inWeatherData;
    /** @var WeatherData */
    private $outWeatherData;

    public function __construct(WeatherData &$in, WeatherData &$out)
    {
        parent::__construct();
        $this->inTempCalculator = new StatsCalculator('Temperature');
        $this->inHumidityCalculator = new StatsCalculator('Humidity');
        $this->inPressureCalculator = new StatsCalculator('Pressure');
        $this->outTempCalculator = new StatsCalculator('Temperature');
        $this->outHumidityCalculator = new StatsCalculator('Humidity');
        $this->outPressureCalculator = new StatsCalculator('Pressure');
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
        $this->inTempCalculator->update($observable->getTemperature());
        $this->inHumidityCalculator->update($observable->getHumidity());
        $this->inPressureCalculator->update($observable->getPressure());


        echo 'Type Sensors: internal' . PHP_EOL;
        echo $this->showChange($this->inTempCalculator) . PHP_EOL;
        echo $this->showChange($this->inHumidityCalculator) . PHP_EOL;
        echo $this->showChange($this->inPressureCalculator) . PHP_EOL;
    }

    /**
     * @param ObservableInterface|WeatherData $observable
     */
    private function processExternalSensors(ObservableInterface $observable): void
    {
        $this->outTempCalculator->update($observable->getTemperature());
        $this->outHumidityCalculator->update($observable->getHumidity());
        $this->outPressureCalculator->update($observable->getPressure());


        echo 'Type Sensors: external' . PHP_EOL;
        echo $this->showChange($this->outTempCalculator) . PHP_EOL;
        echo $this->showChange($this->outHumidityCalculator) . PHP_EOL;
        echo $this->showChange($this->outPressureCalculator) . PHP_EOL;
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
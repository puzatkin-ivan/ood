<?php

class StatsDisplay extends Entity implements ObserverInterface
{
    /** @var StatsCalculator */
    private $tempCalculator;
    /** @var StatsCalculator */
    private $humidityCalculator;
    /** @var StatsCalculator */
    private $pressureCalculator;
    /** @var WeatherData */
    private $inWeatherData;
    /** @var WeatherData */
    private $outWeatherData;

    public function __construct(WeatherData &$in, WeatherData &$out)
    {
        parent::__construct();
        $this->tempCalculator = new StatsCalculator('Temperature');
        $this->humidityCalculator = new StatsCalculator('Humidity');
        $this->pressureCalculator = new StatsCalculator('Pressure');
        $this->inWeatherData = $in;
        $this->outWeatherData = $out;
    }

    /**
     * @param ObservableInterface|WeatherData $observable
     */
    public function update(ObservableInterface $observable): void
    {
        $this->tempCalculator->update($observable->getTemperature());
        $this->humidityCalculator->update($observable->getHumidity());
        $this->pressureCalculator->update($observable->getPressure());
        $sensorType = ($this->inWeatherData === $observable);

        echo 'Type Sensors: ' . $sensorType ? 'internal' : 'external' . PHP_EOL;
        echo $this->showChange($this->tempCalculator) . PHP_EOL;
        echo $this->showChange($this->humidityCalculator) . PHP_EOL;
        echo $this->showChange($this->pressureCalculator) . PHP_EOL;
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
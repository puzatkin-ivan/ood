<?php

class DistinguishingSensorsObserverMock extends Entity implements ObserverInterface
{
    private $inObservable;
    private $outObservable;

    public function __construct(WeatherData& $in, WeatherData $out)
    {
        parent::__construct();
        $this->inObservable = $in;
        $this->outObservable = $out;
    }

    /**
     * @param WeatherData $observable
     */
    public function update(ObservableInterface $observable): void
    {
        echo ' ' . ($observable === $this->outObservable ? 'external' : 'internal') ;
    }
}
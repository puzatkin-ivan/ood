<?php

class Observable implements ObservableInterface
{
    /** @var ObserverInterface[] */
    private $observers = [];

    public function registerObserver(ObserverInterface $observer): void
    {
        array_push($this->observers, $observer);
    }

    public function notifyObservers(): void
    {
        /** @var ObserverInterface $observer */
        foreach ($this->observers as $observer)
        {
            $observer->update($this);
        }
    }

    public function removeObservers(ObserverInterface $observer): void
    {
        $index = array_search($observer, $this->observers);
        if ($index)
        {
            unset($this->observers[$index]);
        }
    }
}
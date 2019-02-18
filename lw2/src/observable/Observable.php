<?php

class Observable implements ObservableInterface
{
    /** @var ObserverInterface[] */
    private $observers = [];

    public function registerObserver(ObserverInterface $observer, int $priority): void
    {
        $index = array_search($observer, $this->observers);
        $item = ['observer' => $observer, 'priority' => $priority];
        if ($index)
        {
            $this->observers[$index] = $item;
        }
        else
        {
            array_push($this->observers, $item);
        }
    }

    public function notifyObservers(): void
    {
        $this->sortByPriority();
        $observers = $this->observers;
        /** @var array $observer */
        foreach ($observers as $observer)
        {
            $observer['observer']->update($this);
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

    private function sortByPriority()
    {
        usort($this->observers, function($lhs, $rhs) {
            return $lhs['priority'] < $rhs['priority'];
        });
    }
}
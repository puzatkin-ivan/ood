<?php

class ObserverMock implements ObserverInterface
{
    public function update(ObservableInterface $observable): void
    {
        $observable->removeObservers($this);
    }
}
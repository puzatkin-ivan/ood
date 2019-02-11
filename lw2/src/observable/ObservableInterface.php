<?php

interface ObservableInterface
{
    public function registerObserver(ObserverInterface $observer): void;
    public function notifyObservers(): void;
    public function removeObservers(ObserverInterface $observer): void;
}
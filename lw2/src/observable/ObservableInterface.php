<?php

interface ObservableInterface
{
    public function registerObserver(ObserverInterface $observer, int $priority): void;
    public function notifyObservers(): void;
    public function removeObservers(ObserverInterface $observer): void;
}
<?php

interface ObserverInterface
{
    public function update(ObservableInterface $observable): void;
}
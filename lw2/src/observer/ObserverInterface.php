<?php

interface ObserverInterface
{
    public function update(WeatherInfo $info): void;
}
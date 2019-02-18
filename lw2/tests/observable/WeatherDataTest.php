<?php
declare(strict_types=1);

require_once __DIR__ . '/../../include/common.php';
use \PHPUnit\Framework\TestCase;

final class WeatherDataTest extends TestCase
{
    public function testRemoveObserverOnUpdate()
    {
        $observable = new Observable();
        $observer = new ObserverMock();
        $observable->registerObserver($observer);
        $observable->registerObserver($observer);
        $observable->registerObserver($observer);
        $observable->notifyObservers();
        $this->assertTrue(true);
    }
}
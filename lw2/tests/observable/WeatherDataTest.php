<?php
declare(strict_types=1);

require_once __DIR__ . '/../../include/common.php';
use \PHPUnit\Framework\TestCase;

final class WeatherDataTest extends TestCase
{
    public function testRemoveObserverOnUpdate(): void
    {
        $observable = new Observable();
        $observable->registerObserver(new ObserverMock('First'), 1);
        $observable->registerObserver(new ObserverMock('Second'), 1);
        $observable->registerObserver(new ObserverMock('Third'), 1);
        ob_start();
        $observable->notifyObservers();
        ob_end_clean();
        $this->assertTrue(true);
    }

    public function testNotifyObserversByPriority(): void
    {
        $observable = new Observable();
        $observable->registerObserver(new ObserverMock('First'), 1);
        $observable->registerObserver(new ObserverMock('Second'), 2);
        $observable->registerObserver(new ObserverMock('Third'), 3);
        ob_start();
        $observable->notifyObservers();
        $stream = ob_get_flush();
        ob_clean();
        $this->assertEquals("Third\r\nSecond\r\nFirst\r\n", $stream);
    }

    public function testNotifyObserversFromDifferentSensorTypes(): void
    {
        $externalObservable = new WeatherData();
        $internalObservable = new WeatherData();
        $observer = new DistinguishingSensorsObserverMock($internalObservable, $externalObservable);
        $externalObservable->registerObserver($observer, 1);
        $internalObservable->registerObserver($observer, 1);
        ob_start();
        $internalObservable->notifyObservers();
        $externalObservable->notifyObservers();
        $stream = ob_get_flush();
        ob_clean();
        $this->assertEquals(' internal external', $stream);
    }
}
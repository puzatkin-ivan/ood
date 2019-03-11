<?php

namespace app;

use canvas\Canvas;
use client\Client;
use designer\Designer;
use factory\ShapeFactory;
use painter\Painter;

class App
{
    public function run(): void
    {
        try
        {
            $factory = new ShapeFactory();
            $designer = new Designer($factory);
            $canvas = new Canvas();
            $client = new Client($canvas);
            $painter = new Painter();
            $client->getPicture($designer);
            $client->drawPicture($painter);
        }
        catch (\Exception $exception)
        {
            echo (string)$exception;
        }
    }
}
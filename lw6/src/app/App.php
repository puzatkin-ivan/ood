<?php

namespace App;

use GraphicsLib\Canvas;
use ModernGraphicsLib\ModernGraphicsRenderer;
use ShapeDrawingLib\CanvasPainter;
use ShapeDrawingLib\Point as ShapePoint;
use ShapeDrawingLib\Rectangle;
use ShapeDrawingLib\Triangle;

class App
{
    public static function run(): void
    {
        $userInput = readline('Should we use new APY (y)?');
        if (mb_strtolower($userInput, 'UTF-8') == 'y')
        {
            self::PaintPictureOnModernGraphicsRenderer();
        }
        else
        {
            self::paintPictureOnCanvas();
        }
    }

    private static function paintPictureOnCanvas(): void
    {
        $simpleCanvas = new Canvas();
        $painter = new CanvasPainter($simpleCanvas);
        self::paintPicture($painter);
    }

    private static function paintPicture(CanvasPainter $painter): void
    {
        $triangle = new Triangle(new ShapePoint(10, 15), new ShapePoint(100, 200), new ShapePoint(150, 250));
        $rectangle = new Rectangle(new ShapePoint(30, 40), 18, 24);

        $painter->draw($triangle);
        $painter->draw($rectangle);
    }

    private static function PaintPictureOnModernGraphicsRenderer(): void
    {
        $renderer = new ModernGraphicsRenderer();
        $canvasAdapter = new ModernGraphicsRendererAdapter($renderer);
        $canvasPainter = new CanvasPainter($canvasAdapter);
        self::paintPicture($canvasPainter);

    }
}
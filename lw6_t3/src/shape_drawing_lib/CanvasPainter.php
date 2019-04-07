<?php

namespace ShapeDrawingLib;

use GraphicsLib\CanvasInterface;

class CanvasPainter
{
    /** @var CanvasInterface */
    private $canvas;

    public function __construct(CanvasInterface $canvas)
    {
        $this->canvas = $canvas;
    }

    public function draw(CanvasDrawableInterface $canvasDrawable): void
    {
        $canvasDrawable->draw($this->canvas);
    }
}
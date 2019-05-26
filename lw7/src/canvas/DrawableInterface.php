<?php

namespace Canvas;

interface DrawableInterface
{
    public function draw(CanvasInterface $canvas): void;
}
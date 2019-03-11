<?php

namespace painter;

use canvas\CanvasInterface;
use shape\PictureDraft;

interface PainterInterface
{
    public function drawPicture(PictureDraft $draft, CanvasInterface $canvas): void;
}
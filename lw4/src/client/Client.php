<?php

namespace client;

use canvas\CanvasInterface;
use designer\DesignerInterface;
use painter\PainterInterface;
use shape\PictureDraft;

class Client
{
    /** @var CanvasInterface */
    private $canvas;
    /** @var PictureDraft */
    private $pictureDraft;

    public function __construct(CanvasInterface $canvas)
    {
        $this->canvas = $canvas;
    }

    public function getPicture(DesignerInterface $designer): PictureDraft
    {
        $this->pictureDraft = $designer->createDraft();
        return $this->pictureDraft;
    }

    public function drawPicture(PainterInterface $painter): void
    {
        $painter->drawPicture($this->pictureDraft, $this->canvas);
    }
}
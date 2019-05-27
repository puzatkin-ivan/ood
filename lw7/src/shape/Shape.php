<?php

namespace Shape;

use Canvas\CanvasInterface;
use Style\OutlineStyleInterface;
use Style\StyleInterface;

abstract class Shape implements ShapeInterface
{
    /** @var OutlineStyleInterface */
    private $outlineStyle;
    /** @var StyleInterface */
    private $fillStyle;
    /** @var GroupShapeInterface|null */
    private $group;

    public function __construct(OutlineStyleInterface $outlineStyle, StyleInterface $fillStyle, ?GroupShapeInterface $group)
    {
        $this->outlineStyle = $outlineStyle;
        $this->fillStyle = $fillStyle;
        $this->group = $group;
    }

    abstract public function getFrame(): Frame;

    abstract public function setFrame(Frame $frame): void;

    abstract public function draw(CanvasInterface $canvas): void;

    public function getOutlineStyle(): OutlineStyleInterface
    {
        return $this->outlineStyle;
    }

    public function getFillStyle(): StyleInterface
    {
        return $this->fillStyle;
    }

    public function getGroup(): ?GroupShapeInterface
    {
        return $this->group;
    }
}
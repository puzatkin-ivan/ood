<?php

namespace Style;

use Color\RGBColor;

class OutlineStyle implements OutlineStyleInterface
{
    /** @var RGBColor */
    private $color;
    /** @var float */
    private $thickness;
    /** @var bool */
    private $enable;

    public function __construct(RGBColor $color, float $thickness, ?bool $enable = true)
    {
        $this->color = $color;
        $this->thickness = $thickness;
        $this->enable = $enable;
    }

    public function getOutlineThickness(): float
    {
        return $this->thickness;
    }

    public function setOutlineThickness(float $thickness): void
    {
        $this->thickness = $thickness;
    }

    public function isEnabled(): bool
    {
        return $this->enable;
    }

    public function enable(bool $enable): void
    {
        $this->enable = $enable;
    }

    public function getColor(): RGBColor
    {
        return clone $this->color;
    }

    public function setColor(RGBColor $color): void
    {
        $this->color = $color;
    }
}
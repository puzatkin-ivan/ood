<?php

namespace Style;

use Color\RGBColor;

class FillStyle implements StyleInterface
{
    /** @var RGBColor */
    private $color;
    /** @var bool */
    private $enable;

    public function __construct(RGBColor $color, ?bool $enable = true)
    {
        $this->color = $color;
        $this->enable = $enable;
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
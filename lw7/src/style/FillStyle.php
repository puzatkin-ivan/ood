<?php

namespace Style;

use Color\RGBColor;

class FillStyle implements StyleInterface
{
    /** @var RGBColor */
    private $color;
    /** @var bool */
    private $enable;

    /**
     * FillStyle constructor.
     * @param RGBColor $color
     * @param bool|null $enable
     */
    public function __construct(RGBColor $color, ?bool $enable = true)
    {
        $this->color = $color;
        $this->enable = $enable;
    }

    public function isEnabled(): bool
    {
        return $this->enable;
    }

    /**
     * @param bool $enable
     */
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
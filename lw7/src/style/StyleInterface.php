<?php

namespace Style;

use Color\RGBColor;

interface StyleInterface
{
    public function isEnabled(): bool;
    public function enable(bool $enable): void;

    public function getColor(): RGBColor;
    public function setColor(RGBColor $color): void;
}
<?php

namespace Style;

use Color\RGBColor;

class GroupFillStyle implements StyleInterface
{
    /** @var GroupFillStyleEnumerator */
    private $enumerator;

    public function __construct(GroupFillStyleEnumerator $enumerator)
    {
        $this->enumerator = $enumerator;
    }

    public function isEnabled(): bool
    {
        $enable = null;
        $this->enumerator->execute(function(StyleInterface $style) use(&$enable) {
            $enable = $style->isEnabled();
        });

        return $enable;
    }

    public function enable(bool $enable): void
    {
        $this->enumerator->execute(function(StyleInterface $style) use($enable) {
            $style->enable($enable);
        });
    }

    public function getColor(): RGBColor
    {
        $color = null;
        $this->enumerator->execute(function(StyleInterface $style) use(&$color) {
            $color = $style->getColor();
        });

        return $color;
    }

    public function setColor(RGBColor $color): void
    {
        $this->enumerator->execute(function(StyleInterface $style) use($color) {
            $style->setColor($color);
        });
    }
}
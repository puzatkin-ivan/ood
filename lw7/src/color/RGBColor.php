<?php

namespace Color;

use OutOfRangeException;

class RGBColor
{
    public const MIN_VALUE = 0;
    public const MAX_VALUE = 255;
    private const MESSAGE_FOR_OUT_OF_RANGE_EXCEPTION = 'The %s shade is out of range';
    /** @var int */
    private $red;
    /** @var int */
    private $green;
    /** @var int */
    private $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        if (!$this->isValidShade($red))
        {
            throw new OutOfRangeException(sprintf(self::MESSAGE_FOR_OUT_OF_RANGE_EXCEPTION, 'red'));
        }
        $this->red = $red;

        if (!$this->isValidShade($green))
        {
            throw new OutOfRangeException(sprintf(self::MESSAGE_FOR_OUT_OF_RANGE_EXCEPTION, 'green'));
        }
        $this->green = $green;

        if (!$this->isValidShade($blue))
        {
            throw new OutOfRangeException(sprintf(self::MESSAGE_FOR_OUT_OF_RANGE_EXCEPTION, 'blue'));
        }
        $this->blue = $blue;
    }

    public function getRedShade(): int
    {
        return $this->red;
    }

    public function getGreenShade(): int
    {
        return $this->green;
    }

    public function getBlueShade(): int
    {
        return $this->blue;
    }

    public function __clone()
    {
        return new RGBColor($this->red, $this->green, $this->blue);
    }

    private function isValidShade(int $shade): bool
    {
        return $shade >= self::MIN_VALUE && $shade <= self::MAX_VALUE;
    }
}
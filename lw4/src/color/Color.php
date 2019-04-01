<?php

namespace color;

use exception\ShapeFactoryException;

class Color
{
    public const GREEN = 'green';
    public const RED = 'red';
    public const BLUE = 'blue';
    public const YELLOW = 'yellow';
    public const PINK = 'pink';
    public const BLACK = 'black';
    public const DEFAULT = self::GREEN;

    private const COLOR = [
        self::GREEN => '#00FF00',
        self::RED => '#FF0000',
        self::BLUE => '#0000FF',
        self::YELLOW => '#F0FF12',
        self::PINK => '#FFC0CB',
        self::BLACK => '#000000',
    ];

    /**
     * @param string|null $type
     * @return string
     * @throws ShapeFactoryException
     */
    public static function getColorByType(?string $type): string
    {
        if (!isset(self::COLOR[$type]))
        {
            throw new ShapeFactoryException("Error: Color isn't exists.");
        }
        return self::COLOR[$type];
    }
}
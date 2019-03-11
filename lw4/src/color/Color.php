<?php

namespace color;

class Color
{
    private const COLOR = [
        'green' => '#00FF00',
        'red' => '#FF0000',
        'blue' => '#0000FF',
        'yellow' => '#F0FF12',
        'pink' => '#FFC0CB',
        'black' => '#000000',
    ];

    public static function getColorByType(?string $type): ?string
    {
        return self::COLOR[$type] ?? null;
    }
}
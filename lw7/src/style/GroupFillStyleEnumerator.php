<?php

namespace Style;

use Shape\ShapeInterface;

class GroupFillStyleEnumerator
{
    /** @var ShapeInterface[] */
    private $shapes;

    public function __construct(array &$shapes)
    {
        $this->shapes = &$shapes;
    }

    public function execute(callable $callback)
    {
        foreach ($this->shapes as $shape)
        {
            $fillStyle = $shape->getFillStyle();
            call_user_func($callback, $fillStyle);
        }
    }
}
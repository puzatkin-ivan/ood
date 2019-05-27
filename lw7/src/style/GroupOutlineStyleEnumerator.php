<?php

namespace Style;

use Shape\ShapeInterface;

class GroupOutlineStyleEnumerator
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
            $outlineStyle = $shape->getOutlineStyle();
            call_user_func($callback, $outlineStyle);
        }
    }
}
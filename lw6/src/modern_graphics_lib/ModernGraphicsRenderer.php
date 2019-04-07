<?php

namespace ModernGraphicsLib;

class ModernGraphicsRenderer
{
    private $isDrawing = false;

    public function __destruct()
    {
        if ($this->isDrawing)
        {
            $this->endDraw();
        }
    }

    public function beginDraw(): void
    {
        if ($this->isDrawing)
        {
            throw new \LogicException('Drawing has already begun.');
        }

        echo '<draw>' . PHP_EOL;
        $this->isDrawing = true;
    }

    public function drawLine(Point $start, Point $end): void
    {
        if (!$this->isDrawing)
        {
            throw new \LogicException('DrawLine is allowed between BeginDraw()/EndDraw() only.');
        }
        echo sprintf(
            '  <line fromX="%d" fromY="%d" toX="%d" toY="%d" />',
            $start->getX(),
            $start->getY(),
            $end->getX(),
            $end->getY()) . PHP_EOL;
    }

    public function endDraw(): void
    {
        if (!$this->isDrawing)
        {
            throw new \LogicException('Drawing has not been started.');
        }
        echo '</draw>' . PHP_EOL;
        $this->isDrawing = false;
    }
}
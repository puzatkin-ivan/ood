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

    public function drawLine(Point $start, Point $end, RGBAColor $color): void
    {
        if (!$this->isDrawing)
        {
            throw new \LogicException('DrawLine is allowed between BeginDraw()/EndDraw() only.');
        }

        $result = $this->getLineTemplate();

        echo sprintf(
            $result,
            $start->getX(),
            $start->getY(),
            $end->getX(),
            $end->getY(),
            $color->getRed(),
            $color->getGreen(),
            $color->getBlue(),
            $color->getAlpha()) . PHP_EOL;
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

    private function getLineTemplate(): string
    {
        return <<<EOF
  <line fromX="%.1f" fromY="%.1f" toX="%.1f" toY="%.1f">
    <color r="%.1f" g="%.1f" b="%.1f" a="%.1f" />
  </line>
EOF;
    }
}
<?php

namespace Canvas;

use Color\RGBColor;
use Shape\Point;

class CanvasSvg implements CanvasInterface
{
    public const DEFAULT_WIDTH = 800;
    public const DEFAULT_HEIGHT = 600;
    public const DEFAULT_THICKNESS = 1;

    /** @var string */
    private $buffer;
    /** @var float */
    private $width;
    /** @var float */
    private $height;
    /** @var RGBColor */
    private $fillColor;
    /** @var RGBColor $outlineColor */
    private $outlineColor;
    /** @var float */
    private $thickness;

    public function __construct()
    {
        $this->buffer = '';
        $this->width = self::DEFAULT_WIDTH;
        $this->height = self::DEFAULT_HEIGHT;
        $this->thickness = self::DEFAULT_THICKNESS;
    }

    public function setFillColor(RGBColor $color): void
    {
        $this->fillColor = $color;
    }

    public function setOutlineColor(RGBColor $color): void
    {
        $this->outlineColor = $color;
    }

    public function setOutlineThickness(float $thickness): void
    {
        $this->thickness = $thickness;
    }

    public function setSize(float $width, float $height): void
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function drawEllipse(Point $center, float $horizontalRadius, float $verticalRadius): void
    {
        $this->buffer .= $this->getEllipse($center->getX(), $center->getY(), $horizontalRadius, $verticalRadius);
    }

    public function drawLine(Point $from, Point $to): void
    {
        $this->buffer .= $this->getLine($from->getX(), $from->getY(), $to->getX(), $to->getY());
    }

    /**
     * @param Point[] $points
     */
    public function drawPolygon(array $points): void
    {
        $pointsStr = '';
        foreach ($points as $point)
        {
            $pointsStr .= $point->getX() . ',' . $point->getY() . ' ';
        }
        $this->buffer .= $this->getPolygon($pointsStr);
    }

    public function __destruct()
    {
        $path =  uniqid('canvas_') . '.svg';
        $this->save('./resources/' . $path);
    }

    private function save(string $path): void
    {
        $header = sprintf($this->getHeader(), $this->width, $this->height);
        $file = $header . $this->buffer . $this->getFooter();

        file_put_contents($path, $file);
    }

    private function getEllipse(float $centerX, float $centerY, float $horizontalRadius, $verticalRadius): string
    {
        $fillColor = sprintf('rgb(%d, %d, %d)', $this->fillColor->getRedShade(), $this->fillColor->getGreenShade(), $this->fillColor->getBlueShade());
        $outlineColor = sprintf('rgb(%d, %d, %d)', $this->outlineColor->getRedShade(), $this->outlineColor->getGreenShade(), $this->outlineColor->getBlueShade());
        return "
<ellipse
  cx=\"{$centerX}\"
  cy=\"{$centerY}\"
  rx=\"{$horizontalRadius}\"
  ry=\"{$verticalRadius}\"
  fill=\"{$fillColor}\"
  stroke-width=\"{$this->thickness}\" 
  stroke=\"{$outlineColor}\" />
";
    }

    private function getLine(float $fromX, float $fromY, float $toX, float $toY): string
    {
        $fillColor = sprintf('rgb(%d, %d, %d)', $this->fillColor->getRedShade(), $this->fillColor->getGreenShade(), $this->fillColor->getBlueShade());
        $outlineColor = sprintf('rgb(%d, %d, %d)', $this->outlineColor->getRedShade(), $this->outlineColor->getGreenShade(), $this->outlineColor->getBlueShade());
        return "
<line 
  x1=\"{$fromX}\"
  x2=\"{$toX}\"
  y1=\"{$fromY}\"
  y2=\"{$toY}\"
  stroke-width=\"{$this->thickness}\" stroke=\"{$outlineColor}\"
  fill=\"{$fillColor}\" />
";
    }

    private function getHeader(): string
    {
        return "<?xml version=\"1.0\" encoding=\"utf-8\"?>
                <!DOCTYPE svg PUBLIC \"-//W3C//DTD SVG 1.1//EN\" \"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd\">
                <svg version=\"1.1\" id=\"Beamed_note\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\"
                      y=\"0px\" width=\"%d\" height=\"%d\" xml:space=\"preserve\">" . PHP_EOL;
    }

    private function getFooter(): string
    {
        return '</svg>';
    }

    private function getPolygon(string $pointsStr): string
    {
        $fillColor = sprintf('rgb(%d, %d, %d)', $this->fillColor->getRedShade(), $this->fillColor->getGreenShade(), $this->fillColor->getBlueShade());
        $outlineColor = sprintf('rgb(%d, %d, %d)', $this->outlineColor->getRedShade(), $this->outlineColor->getGreenShade(), $this->outlineColor->getBlueShade());

        return "
<polygon points='{$pointsStr}' fill='{$fillColor}' stroke='$outlineColor' stroke-width='{$this->thickness}' />
";
    }
}
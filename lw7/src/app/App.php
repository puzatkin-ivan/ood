<?php

namespace App;

use Canvas\CanvasSvg;
use Color\RGBColor;
use Shape\Frame;
use Shape\GroupShape;
use Shape\Point;
use Shape\Rectangle;
use Shape\ShapeInterface;
use Shape\Triangle;
use Slide\Slide;
use Slide\SlideInterface;

class App
{
    public function run(): void
    {
        $slide = $this->createSlide();
        $canvas = new CanvasSvg();
        $slide->draw($canvas);
    }

    private function createSlide(): SlideInterface
    {
        $slide = new Slide(800, 600);

        $home = $this->createHome();

        $slide->addShape($home);
        return $slide;
    }

    private function createHome(): ShapeInterface
    {

        $roof = new Triangle(new Point(300, 50), new Point(150, 130), new Point(450, 130));
        $roof->getFillStyle()->setColor(new RGBColor(75, 105, 51));
        $roof->getOutlineStyle()->setOutlineThickness(5);
        $roof->getOutlineStyle()->setColor(new RGBColor(150, 100, 10));

        $base = new Rectangle(new Point(175, 135), 250, 200);

        $home = new GroupShape();
        $home->insertShape($roof);
        $home->insertShape($base);

        $home->setFrame(new Frame(new Point(100, 100), 200, 100));
        return $home;
    }

}
<?php

namespace designer;

use exception\ShapeFactoryException;
use factory\ShapeFactory;
use painter\Painter;
use shape\PictureDraft;

class Designer implements DesignerInterface
{
    private $factory;

    public function __construct(ShapeFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return PictureDraft
     */
    public function createDraft(): PictureDraft
    {
        $this->printInstruction();
        $pictureDraft = new PictureDraft();
        $isProcessed = true;
        while ($isProcessed)
        {
            $isProcessed = $this->printShapes($pictureDraft);
        }

        return $pictureDraft;
    }

    private function printShapes(PictureDraft $pictureDraft): bool
    {
        try
        {
            $description = readline('> ');
            if ($description == 'exit')
            {
                return false;
            }
            $shape = $this->factory->createShape($description);
            $pictureDraft->addShape($shape);
            return true;
        }
        catch (ShapeFactoryException $exception)
        {
            echo $exception->getMessage() . PHP_EOL;
            $this->printInstruction();
            return true;
        }
    }

    private function printInstruction(): void
    {
        echo 'Help:' . PHP_EOL;
        echo 'Colors: green, red, blue, yellow, pink, black' . PHP_EOL;
        echo '- rectangle <leftTop.x> <leftTop.y> <rightBottom.x> <rightBottom.y> <color>' . PHP_EOL;
        echo '- triangle <vertex1.x> <vertex1.y> <vertex2.x> <vertex2.y> <vertex3.x> <vertex3.y> <color>'. PHP_EOL;
        echo '- ellipse <centerX> <centerY> <horizontalRadius> <verticalRadius> <color>' . PHP_EOL;
        echo '- polygon <centerX> <centerY> <vertexCount> <radius> <color>'. PHP_EOL;
    }
}
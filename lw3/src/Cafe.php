<?php

use Beverage\BeverageInterface;
use Beverage\BlackTea;
use Beverage\Coffee;
use Beverage\DoubleCappuccino;
use Beverage\DoubleLatte;
use Beverage\Latte;
use Beverage\Milkshake;
use beverage\PuerTea;
use Beverage\Tea;
use Condiment\Chocolate;
use Condiment\ChocolateCrumbs;
use Condiment\Cinnamon;
use Condiment\CoconutFlakes;
use Condiment\IceCubes;
use Condiment\IceCubeType;
use Condiment\Lemon;
use Condiment\Liquor;
use Condiment\LiquorType;
use Condiment\Syrup;
use Condiment\SyrupType;

class Cafe
{
    public function run(): void
    {
        $this->dialogWithUser();
        echo PHP_EOL;

        {
            $latte = new Latte();
            $cinnamon = new Cinnamon($latte);
            $lemon =  new Lemon($cinnamon, 2);
            $iceCubes = new IceCubes($lemon,2);
            $beverage = new ChocolateCrumbs($iceCubes, 2);

            echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . PHP_EOL;
        }

        {
            $beverage = new Tea();
            $beverage = new Lemon($beverage, 2);
            $beverage = new IceCubes($beverage, 3, IceCubeType::WATER);

            echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . PHP_EOL;
        }

        {
            $beverage = new PuerTea();
            $beverage = new Syrup($beverage, SyrupType::Maple);
            $beverage = new IceCubes($beverage, 3, IceCubeType::WATER);

            echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . PHP_EOL;
        }

        {
            $beverage = new Milkshake();
            $beverage = new Syrup($beverage, SyrupType::Maple);
            $beverage = new CoconutFlakes($beverage, 8);

            echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . PHP_EOL;
        }

        {
            $beverage = new DoubleCappuccino();
            $beverage = new IceCubes($beverage, IceCubeType::DRY);
            $beverage = new CoconutFlakes($beverage, 12);

            echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . PHP_EOL;
        }

        {
            $beverage = new BlackTea();
            $beverage = new Liquor($beverage, LiquorType::CHOCOLATE);
            $beverage = new Chocolate($beverage, 5);

            echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . PHP_EOL;
        }

        try
        {
            $beverage = new DoubleLatte();
            $beverage = new IceCubes($beverage, IceCubeType::WATER);
            $beverage = new Chocolate($beverage, 6);

            echo $beverage->getDescription() . ' cost: ' . $beverage->getCost() . PHP_EOL;
        }
        catch (OutOfRangeException $exception)
        {
            echo $exception->getMessage();
        }
    }

    private function dialogWithUser(): void
    {
        $beverageChoice = readline('Type 1 for coffee or 2 for tea ');

        $beverage = $this->getBeverageByChoice($beverageChoice);

        if (!isset($beverage))
        {
            return;
        }

        for (;;)
        {
            $condimentChoice = readline('1 - Lemon, 2 - Cinnamon, 0 - Checkout ');

            if ($condimentChoice == 0)
            {
                break;
            }

            if (!is_numeric($condimentChoice))
            {
                return;
            }

           $beverage = $this->addCondimentByChoice($beverage, $condimentChoice);
        }

        echo $beverage->getDescription() . ', cost: ' . $beverage->getCost() . PHP_EOL;

    }

    private function getBeverageByChoice($choice): BeverageInterface
    {
        $beverage = null;
        if ($choice == 1)
        {
            $beverage = new Coffee();
        }
        elseif ($choice == 2)
        {
            $beverage = new Tea();
        }
        return $beverage;
    }

    private function addCondimentByChoice(BeverageInterface $beverage, int $choice): BeverageInterface
    {
        if ($choice == 1)
        {
            $beverage = new Lemon($beverage, 2);
        }
        elseif ($choice == 2)
        {
            $beverage = new Cinnamon($beverage);
        }

        return $beverage;
    }
}

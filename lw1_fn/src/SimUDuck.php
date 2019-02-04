<?php

class SimUDuck
{
    public function run(): void
    {
        $mallardDuck = new MallardDuck();
        $this->playWithDuck($mallardDuck);

        $redHeadDuck = new RedheadDuck();
        $this->playWithDuck($redHeadDuck);

        $rubberDuck = new RubberDuck();
        $this->playWithDuck($rubberDuck);

        $decoyDuck = new DecoyDuck();
        $this->playWithDuck($decoyDuck);

        $modelDuck = new ModelDuck();
        $this->playWithDuck($modelDuck);
        $modelDuck->setFlyBehavior(FlyBehavior\getFlyWithWings());
        $this->playWithDuck($modelDuck);
    }

    private function playWithDuck(Duck $duck): void
    {
        $this->drawDuck($duck);
        $duck->quack();
        $duck->fly();
        $duck->dance();
        echo PHP_EOL;
    }

    private function drawDuck(Duck $duck): void
    {
        $duck->display();
    }
}
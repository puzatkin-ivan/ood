<?php

namespace Document;

interface ImageInterface
{
    public function getPath(): string;

    public function getWidth(): float;

    public function getHeight(): float;

    public function resize(float $width, float $height): void;
}
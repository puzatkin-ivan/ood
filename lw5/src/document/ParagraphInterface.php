<?php

namespace Document;

interface ParagraphInterface
{
    public function getText(): string;

    public function setText(string $text): void;
}
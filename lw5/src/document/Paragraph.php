<?php

namespace Document;

class Paragraph implements ParagraphInterface, DocumentItemInterface
{
    /** @var string */
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function toString(): string
    {
        return "<p>{$this->text}</p>";
    }
}
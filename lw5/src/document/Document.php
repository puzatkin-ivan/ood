<?php

namespace Document;

class Document implements DocumentInterface
{
    /** @var string */
    private $title = '';
    /** @var array */
    private $documentItems = [];

    public function addDocumentItem(DocumentItemInterface $documentItem, ?int $index = null): void
    {
        if (!isset($index))
        {
            array_push($this->documentItems, $documentItem);
            return;
        }

        if ($index < 0 && $index >= count($this->documentItems))
        {
            throw new \OutOfRangeException('Значение индекса не входит в промежоток массива');
        }
        $this->documentItems = array_merge(
            array_slice($this->documentItems, 0, $index),
            [$documentItem],
            array_slice($this->documentItems, $index, count($this->documentItems))
        );
    }

    public function getItemsCount(): int
    {
        return count($this->documentItems);
    }

    public function getItem(int $index): ?DocumentItemInterface
    {
        return $this->documentItems[$index] ?? null;
    }

    public function getItems(): array
    {
        return $this->documentItems;
    }

    public function deleteItem(int $index): void
    {
        if (!isset($this->documentItems[$index]))
        {
            throw new \LogicException('Unknown document item position.');
        }
        unset($this->documentItems[$index]);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}

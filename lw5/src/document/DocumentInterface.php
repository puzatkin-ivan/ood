<?php

namespace Document;

interface DocumentInterface
{
    public function addDocumentItem(DocumentItemInterface $documentItem, ?int $index): void;

    public function getItemsCount(): int;

    public function getItem(int $index): ?DocumentItemInterface;

    public function getItems(): array;

    public function deleteItem(int $index): void;

    public function getTitle(): string;

    public function setTitle(string $title): void;
}
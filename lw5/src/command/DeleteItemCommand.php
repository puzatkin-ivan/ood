<?php

namespace Command;

use Document\DocumentInterface;
use Document\DocumentItemInterface;

class DeleteItemCommand implements CommandInterface
{
    /** @var DocumentInterface */
    private $document;
    /** @var int */
    private $position;
    /** @var DocumentItemInterface */
    private $documentItem;

    public function __construct(DocumentInterface $document, int $position)
    {
        $this->document = $document;
        $this->position = $position;
    }

    public function execute(): void
    {
        $this->documentItem = $this->document->getItem($this->position);
        $this->document->deleteItem($this->position);
    }

    public function unexecute(): void
    {
        $this->document->addDocumentItem($this->documentItem, $this->position);
    }
}
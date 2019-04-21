<?php

namespace Command;

use Document\DocumentItemInterface;

class InsertDocumentItemCommand implements CommandInterface
{
    public function __construct(array $documentItems, DocumentItemInterface $documentItem, ?int $position = null)
    {
    }

    public function execute(): void
    {
        // TODO: Implement execute() method.
    }

    public function unexecute(): void
    {
        // TODO: Implement unexecute() method.
    }
}
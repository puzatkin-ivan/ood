<?php

namespace Command;

class DeleteItemCommand implements CommandInterface
{
    /** @var int */
    private $index;
    /** @var array */
    private $documentItems;

    public function __construct(int $index, array $documentItems)
    {
        $this->index = $index;
        $this->documentItems = $documentItems;
    }

    public function execute(): void
    {
    }

    public function unexecute(): void
    {
    }
}
<?php

namespace Command;

use Command\Exception\InvalidCommandArgumentException;
use Document\DocumentInterface;

class SetTitleCommand implements CommandInterface
{
    private const COMMAND_ARGS_COUNT = 2;

    /** @var string */
    private $prevTitle;
    /** @var string */
    private $title;
    /** @var DocumentInterface */
    private $document;

    /**
     * SetTitleCommand constructor.
     * @param DocumentInterface $document
     * @param string $title
     */
    public function __construct(DocumentInterface $document, string $title)
    {
        $this->document = $document;

        $this->title = $title;
    }

    public function execute(): void
    {
        $this->prevTitle = $this->document->getTitle();
        $this->document->setTitle($this->title);
    }

    public function unexecute(): void
    {
        $this->document->setTitle($this->prevTitle);
    }
}
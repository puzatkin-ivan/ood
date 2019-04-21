<?php

namespace Document;

use Command\CommandHistoryInterface;
use Command\DeleteItemCommand;
use Command\InsertDocumentItemCommand;

class Document implements DocumentInterface
{
    /** @var string */
    private $title;
    /** @var array */
    private $documentItems;
    /** @var CommandHistoryInterface */
    private $commandHistory;

    public function insertParagraph(string $text, ?int $position = null): ParagraphInterface
    {
        $documentItem = new Paragraph($text);
        $command = new InsertDocumentItemCommand($this->documentItems, $documentItem, $position);
        $command->execute();
        $this->commandHistory->addCommand($command);
        return $documentItem;
    }

    public function insertImage(string $path, int $width, int $height, int $position = null): ImageInterface
    {
        $documentItem = new Image($path, $width, $height);
        $command = new InsertDocumentItemCommand($this->documentItems, $documentItem, $position);
        $command->execute();
        $this->commandHistory->addCommand($command);
        return $documentItem;
    }

    public function getItemsCount(): int
    {
        return count($this->documentItems);
    }

    public function getItem(int $index): ?DocumentItemInterface
    {
        return $this->documentItems[$index] ?? null;
    }

    public function deleteItem(int $index): void
    {
        $command = new DeleteItemCommand($index, $this->documentItems);
        $command->execute();
        $this->commandHistory->addCommand($command);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function canUndo(): bool
    {
        return $this->commandHistory->canUndo();
    }

    public function undo(): void
    {
        $this->commandHistory->undo();
    }

    public function canRedo(): bool
    {
        return $this->commandHistory->canRedo();
    }

    public function redo(): void
    {
        $this->commandHistory->redo();
    }

    public function save(string $path): void
    {
        $documentItemsStr = $this->renderDocumentItems($this->documentItems);
        $document = $this->renderDocument($documentItemsStr);
        file_put_contents($path, $document);
    }

    /**
     * @param DocumentItemInterface[] $documentsItems
     * @return string
     */
    private function renderDocumentItems(array $documentsItems): string
    {
        $result = '';
        foreach ($documentsItems as $documentsItem)
        {
            $result .= $documentsItem->toString();
        }
        return $result;
    }

    private function renderDocument(string $body): string
    {
        return <<<EOF
<!DOCTYPE html>
<html>
  <head></head>
  <body>
    {$body}
  </body>
</html>
EOF;
    }
}

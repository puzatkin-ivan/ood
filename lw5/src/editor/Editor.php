<?php

namespace Editor;

use Command\History\CommandHistory;
use Command\History\Exception\CommandHistoryException;
use Command\InsertImageCommand;
use Command\InsertParagraphCommand;
use Command\SaveCommand;
use Command\SetTitleCommand;
use Document\DocumentInterface;
use Document\Image;
use Document\Paragraph;
use ImageController\ImageController;
use ImageController\ImageControllerInterface;
use \Exception;

class Editor implements EditorInterface
{
    const WORKING_IMAGE_DIRECTORY = '\\resources\\images';
    /** @var DocumentInterface */
    private $document;
    /** @var CommandHistory */
    private $commandHistory;
    /** @var ImageControllerInterface */
    private $imageController;

    public function __construct(DocumentInterface $document)
    {
        $this->document = $document;
        $this->commandHistory = new CommandHistory();
        $this->imageController = new ImageController(ROOT_DIR . self::WORKING_IMAGE_DIRECTORY);
    }

    public function setTitle(string $title): void
    {
        $command = new SetTitleCommand($this->document, $title);
        $command->execute();
        $this->commandHistory->addCommand($command);
    }

    public function insertImage(string $path, int $width, int $height, ?int $position = 0): void
    {
        $newPath = $this->imageController->addImage($path);
        $image = new Image($newPath, $width, $height);
        $command = new InsertImageCommand($this->document, $image, $position);
        $command->execute();
        $this->commandHistory->addCommand($command);
    }

    public function insertParagraph(string $text, ?int $position = 0)
    {
        $paragraph = new Paragraph($text);
        $command = new InsertParagraphCommand($this->document, $paragraph, $position);
        $command->execute();
        $this->commandHistory->addCommand($command);
    }

    public function canUndo(): bool
    {
        return $this->commandHistory->canUndo();
    }

    /**
     * @throws CommandHistoryException
     */
    public function undo(): void
    {
        $this->commandHistory->undo();
    }

    public function canRedo(): bool
    {
        return $this->commandHistory->canRedo();
    }

    /**
     * @throws CommandHistoryException
     */
    public function redo(): void
    {
        $this->commandHistory->redo();
    }

    /**
     * @param string $path
     * @throws Exception
     */
    public function save(string $path): void
    {
        if (!is_dir($path))
        {
            throw new Exception('Directory isn\'t exists.');
        }
        $command = new SaveCommand($this->document, $this->imageController, $path);
        $command->execute();
        $this->commandHistory->addCommand($command);
    }
}
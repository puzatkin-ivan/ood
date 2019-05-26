<?php

namespace Command;

use Document\DocumentInterface;
use Exporter\HtmlExporter;
use ImageController\ImageControllerInterface;

class SaveCommand implements CommandInterface
{
    const FILE_NAME = 'index.html';
    const IMAGE_DIRECTORY = 'images';
    /** @var DocumentInterface */
    private $document;
    /** @var string */
    private $path;
    /** @var ImageControllerInterface */
    private $imageController;

    public function __construct(DocumentInterface $document, ImageControllerInterface $controller, string $path)
    {
        $this->document = $document;
        $this->imageController = $controller;
        $this->path = $path;
    }

    public function execute(): void
    {
        $filePath = $this->path . '/' . self::FILE_NAME;
        $exporter = new HtmlExporter();
        $htmlDocument = $exporter->export($this->document);

        file_put_contents($filePath, $htmlDocument);
        $this->imageController->deleteImageWhichMarkAsDeleted();
        $this->imageController->copyFilesToDirectory($this->path . '/' . self::IMAGE_DIRECTORY);
    }

    public function unexecute(): void
    {

    }
}
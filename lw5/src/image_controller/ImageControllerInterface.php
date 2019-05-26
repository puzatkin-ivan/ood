<?php

namespace ImageController;

interface ImageControllerInterface
{
    public function addImage(string $path): string;

    public function markAsDeleted(string $path): void;

    public function unmarkAsDeleted(string $path): void;

    public function deleteImageWhichMarkAsDeleted(): void;

    public function copyFilesToDirectory(string $path): void;
}
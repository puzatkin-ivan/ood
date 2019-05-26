<?php

namespace App;

use Command\Exception\CommandNotFoundException;
use Command\History\Exception\CommandHistoryException;
use Document\Document;
use Editor\Editor;
use Editor\EditorInterface;
use Menu\Menu;
use Menu\MenuItem;

class App
{
    const EXIT_COMMAND = 'exit';
    const SET_TITLE_COMMAND = 'set_title';
    const INSERT_PARAGRAPH = 'insert_paragraph';
    const INSERT_IMAGE = 'insert_image';
    const UNDO = 'undo';
    const REDO = 'redo';
    const SAVE = 'save';
    const LIST = 'list';

    private $isExit = false;

    public function run(): void
    {
        $document = new Document();
        $editor = new Editor($document);

        $menu = new Menu();
        $this->initializeCommandMap($menu, $editor);

        while (!$this->isExit)
        {
            $commandStr = readline('> ');
            $this->executeCommand($menu, $commandStr);
        }
    }

    public function gate(): void
    {
        $this->isExit = true;
    }

    private function executeCommand(Menu $menu, string $commandStr): void
    {
        try
        {
            $commandStr = $this->removeExtraSpaces($commandStr);
            $commandArgs = explode(' ', $commandStr);

            $menu->executeCommand($commandArgs[0], $commandArgs);
        }
        catch (CommandNotFoundException $exception)
        {
            echo $exception->getMessage() . PHP_EOL;
        }
        catch (CommandHistoryException $exception)
        {
            echo $exception->getMessage() . PHP_EOL;
        }
        catch (\Exception $exception)
        {
            echo $exception->getMessage() . PHP_EOL;
        }
    }

    private function initializeCommandMap(Menu $menu, EditorInterface $editor): void
    {
        $menu->addItem(App::EXIT_COMMAND, 'Exit application', $this->getExitCommandCallback());
        $menu->addItem(App::SET_TITLE_COMMAND, 'set_title <title>', $this->getSetTitleCallback($editor));
        $menu->addItem(App::INSERT_PARAGRAPH, '', $this->getInsertParagraphCallback($editor));
        $menu->addItem(App::INSERT_IMAGE, '', $this->getInsertImageCallback($editor));
        $menu->addItem(App::UNDO, '', $this->getUndoCallback($editor));
        $menu->addItem(App::REDO, '', $this->getRedoCallback($editor));
        $menu->addItem(App::SAVE, '', $this->getSaveCallback($editor));
        $menu->addItem(App::LIST, '', $this->getShowCommandsCallback($menu));
    }

    private function getExitCommandCallback(): callable
    {
        return function(array $commandArgs) {
            $this->gate();
        };
    }

    private function getSetTitleCallback(EditorInterface $editor): callable
    {
        return function(array $commandArgs) use($editor) {
            if (count($commandArgs) != 2)
            {
                return;
            }
            $editor->setTitle($commandArgs[1]);
        };
    }

    private function getInsertParagraphCallback(EditorInterface $editor): callable
    {
        return function(array $commandArgs) use($editor) {
            if (count($commandArgs) != 2 && count($commandArgs) != 3)
            {
                return;
            }
            $editor->insertParagraph($commandArgs[1], $commandArgs[2] ?? 0);
        };
    }

    private function getInsertImageCallback(EditorInterface $editor): callable
    {
        return function(array $commandArgs) use($editor) {
            if (count($commandArgs) != 5 && count($commandArgs) != 6)
            {
                return;
            }

            $editor->insertImage($commandArgs[1], $commandArgs[2], $commandArgs[3], $commandArgs[4] ?? 0);
        };
    }

    private function getUndoCallback(EditorInterface $editor): callable
    {
        return function(array $commandArgs) use($editor) {
            $editor->undo();
        };
    }

    private function getRedoCallback(EditorInterface $editor): callable
    {
        return function(array $commandArgs) use($editor) {
            $editor->redo();
        };
    }

    private function getSaveCallback(EditorInterface $editor): callable
    {
        return function(array $commandArgs) use($editor) {
            if (count($commandArgs) != 2)
            {
                return;
            }

            $editor->save($commandArgs[1]);
        };
    }

    private function getShowCommandsCallback(Menu $menu): callable
    {
        return function() use ($menu) {
            $commands = $menu->getCommands();
            echo 'Commands: ' . PHP_EOL;
            /** @var MenuItem $command */
            foreach ($commands as $command)
            {
                echo '- ' . $command->getCommandName() . ': ' . $command->getDescription() . PHP_EOL;
            }
        };
    }

    private function removeExtraSpaces(string $line): string
    {
        return preg_replace('/^ +| +$|( ) +/m', '$1', $line);
    }
}
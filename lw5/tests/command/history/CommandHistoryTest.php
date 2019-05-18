<?php

namespace Command\History;

use Command\History\Exception\CommandHistoryException;
use Command\MockCommand;
use PHPUnit\Framework\TestCase;

class CommandHistoryTest extends TestCase
{
    const SUCCESS_EXECUTED = 0;
    const ERROR = 1;

    public function testCannotUndoWhenCommandHistoryIsEmpty(): void
     {
         $history = new CommandHistory();
         $this->assertNotTrue($history->canUndo());

         $code = $this->tryToUndoCommand($history);
         $this->assertEquals($code, self::ERROR);
     }

     public function testCannotRedoWhenCommandHistoryIsEmpty(): void
     {
         $history = new CommandHistory();

         $code = $this->tryToRedoCommand($history);
         $this->assertEquals($code, self::ERROR);
     }

     public function testCanUndoWhenExecutedCommand(): void
     {
         $command = new MockCommand();
         $history = new CommandHistory();

         $command->execute();
         $history->addCommand($command);
         $this->assertEquals($command->getState(), MockCommand::EXECUTED);

         $this->assertTrue($history->canUndo());
         $code = $this->tryToUndoCommand($history);
         $this->assertEquals($code, self::SUCCESS_EXECUTED);
         $this->assertEquals($command->getState(), MockCommand::CANCELED);
     }

     public function testCannotRedoBeforeUndo(): void
     {
         $command = new MockCommand();
         $history = new CommandHistory();

         $command->execute();
         $history->addCommand($command);
         $this->assertEquals($command->getState(), MockCommand::EXECUTED);

         $this->assertNotTrue($history->canRedo());
         $code = $this->tryToRedoCommand($history);
         $this->assertEquals($code, self::ERROR);
     }

     public function testCanRedoAfterUndo(): void
     {
         $command = new MockCommand();
         $history = new CommandHistory();

         $command->execute();
         $history->addCommand($command);

         $this->assertEquals($command->getState(), MockCommand::EXECUTED);

         $code = $this->tryToUndoCommand($history);
         $this->assertEquals($code, self::SUCCESS_EXECUTED);
         $this->assertEquals($command->getState(), MockCommand::CANCELED);

         $codeRedoExecuted = $this->tryToRedoCommand($history);
         $this->assertEquals($codeRedoExecuted, self::SUCCESS_EXECUTED);
         $this->assertEquals($command->getState(), MockCommand::EXECUTED);
     }

     private function tryToUndoCommand(CommandHistoryInterface $commandHistory): int
     {
         try
         {
             $commandHistory->undo();
             $result = self::SUCCESS_EXECUTED;
         }
         catch (CommandHistoryException $exception)
         {
             $result = self::ERROR;
         }

         return $result;
     }

     private function tryToRedoCommand(CommandHistoryInterface $commandHistory): int
     {
         try
         {
             $commandHistory->redo();
             $result = self::SUCCESS_EXECUTED;
         }
         catch (CommandHistoryException $exception)
         {
             $result = self::ERROR;
         }

         return $result;
     }
}
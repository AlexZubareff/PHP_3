<?php
// Данный инициализирует весь процесс.

class Invoker
{
    private $execute;
    private $undo;

    public function submitExecute(Command $Command)
    {
        $this->execute=$Command;
        $this->execute->execute();
    }

    public function submitUndo(Command $Command)
    {
        $this->undo=$Command;
        $this->undo->undo();
    }
}

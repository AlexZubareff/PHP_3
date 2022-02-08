<?php
// Receiver

class textCommand
{
    public function state()
    {
        //функция записи состояния документа перед операцией
        echo 'Write state'. PHP_EOL;
    }
    public function previousState()
    {
        //Функция возврата к предыдущему состоянию текста
        echo 'Back to previous state'. PHP_EOL;
    }

    public function select()
    {
        // функция выделения текста
        echo 'Select text'. PHP_EOL;
    }
    public function unSelect()
    {
        // функция отмены выделения текста
        echo 'UnSelect text'. PHP_EOL;
    }

    public function copy()
    {
        // функция копирования текста
        echo 'Copy text'. PHP_EOL;
    }
    public function unCopy()
    {
        // функция отмены копирования текста
        echo 'UnCopy text'. PHP_EOL;
    }

    public function cut()
    {
        // функция вырезания текста
        echo 'Cut text'. PHP_EOL;
    }

    public function unCut()
    {
        // функция отмены вырезания текста
        echo 'UnCut text'. PHP_EOL;
    }

    public function paste()
    {
        // функция вставки текста
        echo 'Paste text'. PHP_EOL;
    }

    public function unPaste()
    {
        // функция отмены вставки текста
        echo 'UnPaste text'. PHP_EOL;
    }

}

// Command


interface Command
{
    public function execute();
    public function undo();
}

class selectText implements Command
{
    private $textControl;

    public function __construct(textCommand $textControl)
    {
        $this->textControl = $textControl;
    }
    public function execute()
    {
        $this->textControl->select();
    }
    public function undo()
    {
        $this->textControl->unSelect();
    }
}

class copyText implements Command
{
    private $textControl;

    public function __construct(textCommand $textControl)
    {
        $this->textControl = $textControl;
    }
    public function execute()
    {
        $this->textControl->copy();
    }
    public function undo()
    {
        $this->textControl->unCopy();
    }

}

class cutText implements Command
{
    private $textControl;
    public function __construct(textCommand $textControl)
    {
        $this->textControl = $textControl;
    }
    public function execute()
    {
        $this->textControl->cut();
    }
    public function undo()
    {
        $this->textControl->unCut();
    }
}

class pasteText implements Command
{
    private $textControl;
    public function __construct(textCommand $textControl)
    {
        $this->textControl = $textControl;
    }
    public function execute()
    {
        $this->textControl->paste();
    }
    public function undo()
    {
        $this->textControl->unPaste();
    }
}

class writeState implements Command
{
    private $textControl;
    public function __construct(textCommand $textControl)
    {
        $this->textControl=$textControl;
    }
    public function execute()
    {
        $this->textControl->state();
    }
    public function undo()
    {
        $this->textControl->previousState();
    }
}


// Invoker

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


// Клиентский код

$invoker=new Invoker();
$textCommand=new textCommand();
$invoker->submitExecute(new copyText($textCommand));
$invoker->submitUndo(new copyText($textCommand));
$invoker->submitExecute(new writeState($textCommand));
$invoker->submitUndo(new writeState($textCommand));

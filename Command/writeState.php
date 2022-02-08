<?php
// Данный класс сожержит информацию о действии которое надо выполнить(writeState). Он вызывает соответствующий
// метод у Resiver(textCommand)

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
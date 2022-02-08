<?php
// Данный класс сожержит информацию о действии которое надо выполнить(pasteText). Он вызывает соответствующий
// метод у Resiver(textCommand)

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
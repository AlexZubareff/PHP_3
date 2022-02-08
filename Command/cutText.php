<?php
// Данный класс сожержит информацию о действии которое надо выполнить(cutText). Он вызывает соответствующий
// метод у Resiver(textCommand)


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
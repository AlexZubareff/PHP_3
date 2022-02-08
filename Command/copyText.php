<?php
// Данный класс сожержит информацию о действии которое надо выполнить(copyText). Он вызывает соответствующий
// метод у Resiver(textCommand)

class copyText  implements Command
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
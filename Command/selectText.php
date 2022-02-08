<?php
// Данный класс сожержит информацию о действии которое надо выполнить(selectText). Он вызывает соответствующий
// метод у Resiver(textCommand)

class selectText  implements Command
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
<?php

class EmailNotifier extends NotifierDecorator
{
    public function notice($message): string
    {
        return "Email ".parent::notice($message);
    }
}
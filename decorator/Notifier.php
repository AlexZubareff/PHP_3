<?php

class Notifier implements INotifier
{
    public function notice($message): string
    {
        return $message;
    }
}

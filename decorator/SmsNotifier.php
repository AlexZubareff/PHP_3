<?php

class SmsNotifier extends NotifierDecorator
{
    public function notice($message): string
    {
        return "Telegram".parent::notice($message);
    }
}
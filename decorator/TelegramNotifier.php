<?php

class TelegramNotifier extends NotifierDecorator
{
    public function notice($message): string
    {
        return "Telegram".parent::notice($message);
    }
}

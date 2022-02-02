<?php


/**
 * Пользовательский код
 */
// напишим простую функцию, которая принимает сообщение и вызывает декоратор
function getNotification($message, $decorator)
{
    echo $decorator->notify($message);
}

// создадим переменную, содержающую объект Notifier, который выводит это сообщение
$textMessage = new Notifier();

// создадим декоратор и передадим в него сообщение
$notifierDecorator = new NotifierDecorator($textMessage);

// создадим наследников для каждого метода оповещения через декоратор, с тем же сообщением
$emailNotifier = new EmailNotifier($textMessage);
$smsNotifier = new SMSNotifier($textMessage);
$telegramNotifier = new TelegramNotifier($textMessage);

// вызовим функцию для телеграмм
getNotification("Telegram", $telegramNotifier);
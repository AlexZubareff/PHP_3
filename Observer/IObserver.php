<?php
/*
 * Интерфейс наблюдателя
 */

interface Observer
{
    public function subscribe(Subscriber $subscriber);
    public function unsubscribe(Subscriber $subscriber);
    public function updateVacancyCatalog(string $itemVacancy);
    public function notifySubscribers();
}
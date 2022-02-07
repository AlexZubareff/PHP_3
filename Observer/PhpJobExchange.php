<?php
/*
 * Класс базы вакансий
 */

class PhpJobExchange implements Observer
{
    private array $subscribers = [];
    private array $vacancy = [];

    public function __construct(array $startVacancy)
    {
        $this->vacancy = array_merge($this->vacancy,$startVacancy);
    }

    public function subscribe(Subscriber $subscriber)
    {
        $this->subscribers[$subscriber->getName()]=$subscriber;
        $subscriber->notify($this->vacancy);
    }

    public function unsubscribe(Subscriber $subscriber)
    {
        unset($this->subscribers[$subscriber->getName()]);
    }

    public function updateVacancyCatalog(string $itemVacancy)
    {
        $this->vacancy[] = $itemVacancy;
        echo $itemVacancy." Новая вакансия" . PHP_EOL;
        $this->notifySubscribers();
    }

    public function notifySubscribers()
    {
        foreach ($this->subscribers as $subscriber)
        {
            $subscriber->notify($this->vacancy);
        }
    }
}

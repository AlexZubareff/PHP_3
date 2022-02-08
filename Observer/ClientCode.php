<?php
/*
 * Абстрактный класс соискателя вакансии
 */
class AbstractCandidate implements Subscriber
{
    protected string $name;
    protected string $email;
    protected int $experience;

    public function __construct(string $name, string $email, int $experience)
    {
        $this->name=$name;
        $this->email=$email;
        $this->experience=$experience;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getExperience(): int
    {
        return $this->experience;
    }

    public function notify($vacancy)
    {

    }
}

/*
 * Класс конкретного соискателя
 */

class Candidate extends AbstractCandidate
{
    public function notify($vacancy)
    {
        echo "Ура! Еще одна вакснсия. ".$this->getName()." Смотри быстрее, а то уйдёт!!!". PHP_EOL;
    }
}

/*
 * Интерфейс подписчика на вакансии
 */
interface Subscriber
{
    public function getName();
    public function getEmail();
    public function getExperience();
    public function notify($vacancy);
}

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
        echo " Новая вакансия ".$itemVacancy . PHP_EOL;
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

/*
 * Клиентский код
 */
$phpJobExchange = new PhpJobExchange(array("vacancy_1", "vacancy_2", "vacancy_3","vacancy_4"));
$candidateAlex = new Candidate("Alex", "ads@sdgf.ru", 5);
$phpJobExchange->subscribe($candidateAlex);
$phpJobExchange->updateVacancyCatalog("vacancy_5");


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
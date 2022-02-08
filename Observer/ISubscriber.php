<?php
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
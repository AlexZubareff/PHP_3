<?php

/*
 * Интерфейс типа платежей
 */
Interface PaymentType
{
    public function makePayment(int $price, int $phone);
}
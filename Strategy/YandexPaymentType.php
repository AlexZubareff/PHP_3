<?php
/*
 * Класс платежей YANDEX
 */
class YandexPaymentType implements PaymentType
{
    public function makePayment(int $price, int $phone)
    {
        echo 'PAYMENT YANDEX';
        return true;
    }
}
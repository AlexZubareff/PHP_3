<?php
/*
 * Класс платежей WEBMONEY
 */
class WebMoneyPaymentType implements PaymentType
{
    public function makePayment(int $price, int $phone)
    {
        echo 'PAYMENT WEBMONEY';
        return true;
    }
}
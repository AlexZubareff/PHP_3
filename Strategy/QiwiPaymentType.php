<?php
/*
 * Класс платежей QIWI
 */
class QiwiPaymentType implements PaymentType
{
    public function makePayment(int $price, int $phone)
    {
        echo 'PAYMENT QIWI'. $price.','.$phone;
        return true;
    }
}

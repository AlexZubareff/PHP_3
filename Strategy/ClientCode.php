<?php

Interface PaymentType
{
    public function makePayment(int $price, int $phone);
}

class QiwiPaymentType implements PaymentType
{
    public function makePayment(int $price, int $phone)
    {
       echo 'PAYMENT QIWI'. $price.','.$phone;
       return true;
    }
}

class WebMoneyPaymentType implements PaymentType
{
    public function makePayment(int $price, int $phone)
    {
        echo 'PAYMENT WEBMONEY';
        return true;
    }
}

class YandexPaymentType implements PaymentType
{
    public function makePayment(int $price, int $phone)
    {
        echo 'PAYMENT YANDEX';
        return true;
    }
}

class PaymentService
{
    private $service;
    private $services=[];

    public function addService(PaymentType $service, string $serviceName)
    {
     $this->services[$serviceName]=$service;
    }

    public function setService(string $service)
    {
    $this->service = $service;
    }
    public function makePayment(int $price, int $phone)
    {
        return $this->services[$this->service]->makePayment($price, $phone);
    }
}

$paymentService = new PaymentService();
$paymentService->addService(new QiwiPaymentType(),'QIWI');
$paymentService->addService(new YandexPaymentType(), 'YANDEX');
$paymentService->addService(new WebMoneyPaymentType(), 'WEB MONEY');

$paymentService->setService('yandex');
$paymentService->makePayment(23,1235467878);

$paymentService->setService('qiwi');
$paymentService->makePayment(255, 4567891245);

$paymentService->setService('webmoney');
$paymentService->makePayment(1000, 9992221245);

<?php
/*
 * Класс системы платежей
 */
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

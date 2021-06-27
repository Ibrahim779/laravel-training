<?php


namespace App\Services\Payment;


interface PaymentGatewayInterface
{

    public function setTotal($total);

    public function setCurrency($currency);

    public function setSuccessUrl($successUrl);

    public function setCancelUrl($cancelUrl);

    public function execute();

    public function getMethods();


}

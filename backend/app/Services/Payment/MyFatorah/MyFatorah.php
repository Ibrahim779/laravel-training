<?php


namespace App\Services\Payment\MyFatorah;


use App\Models\Cart;
use App\Services\Payment\MyFatorah\support\ApiCall;
use App\Services\Payment\PaymentGatewayInterface;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Validator;

class MyFatorah implements PaymentGatewayInterface
{

    private $currency;

    private $total;

    private $successUrl;

    private $cancelUrl;

    private $paymentMethodId;

    private $data;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data ?: $this->getExecutePaymentData();
    }

    /**
     * @param mixed $data
     */
    public function setData($data = null)
    {
        if ($data) {
            $this->data = $data;
        }
    }

    /**
     * @return mixed
     */
    public function getPaymentMethodId()
    {
        return $this->paymentMethodId;
    }

    /**
     * @param mixed $paymentMethodId
     */
    public function setPaymentMethodId($paymentMethodId)
    {
        $this->paymentMethodId = $paymentMethodId;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getSuccessUrl()
    {
        return $this->successUrl;
    }

    /**
     * @param mixed $successUrl
     */
    public function setSuccessUrl($successUrl)
    {
        $this->successUrl = $successUrl;
    }

    /**
     * @return mixed
     */
    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    /**
     * @param mixed $cancelUrl
     */
    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
    }

    public function setCurrency($currency)
    {
        if (in_array($currency, $this->getCurrencyCodes()))
            $this->currency = $currency;
    }

    public function execute()
    {
        return ApiCall::post(config('fatoorah.ExecutePayment'),
            $this->getData())->Data;
    }

    public function getPaymentUrl($response)
    {
        return $response->PaymentURL;
    }

    public  function getMethods()
    {
        $paymentMethods = ApiCall::post(config('fatoorah.InitiatePayment'),
            $this->getPaymentMethodsData())->Data->PaymentMethods;

        $paymentMethods = array_filter($paymentMethods, function ($paymentMethod) {
            if (in_array($paymentMethod->PaymentMethodEn, $this->getPaymentMethodsNames())) {
                return $paymentMethod;
            }
        });

        return $paymentMethods;
    }

    private function getPaymentMethodsNames()
    {
        return ['KNET', 'VISA/MASTER', 'MADA'];
    }

    private function getCurrencyCodes()
    {
        return ['KWD', 'SAR', 'BHD', 'AED', 'QAR', 'OMR', 'JOD', 'EGP'];
    }

    private function getExecutePaymentData()
    {
        return [
            'paymentMethodId' => $this->paymentMethodId,
            'InvoiceValue'    => $this->total,
            'CallBackUrl'     => $this->successUrl,
            'ErrorUrl'        => $this->cancelUrl,
        ];
    }

    private function getPaymentMethodsData()
    {
        return [
            "InvoiceAmount" => $this->total,
            "CurrencyIso" => $this->currency
        ];
    }

    public function optionalData(array $data)
    {
        return $this->data = array_merge($this->getData(), $data);
    }
}

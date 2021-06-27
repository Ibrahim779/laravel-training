<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Services\Payment\MyFatorah\MyFatorah;
use App\Services\Payment\PaymentGatewayInterface;
use App\Traits\SaveData\OrderSaveData;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    use OrderSaveData;

    private $paymentGateway;

    /**
     * CheckoutController constructor.
     * @param $paymentGateway
     */
    public function __construct(PaymentGatewayInterface $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;

        $this->setPaymentData();
    }

    public function index()
    {
        $paymentMethods = $this->paymentGateway->getMethods();

        return view('site.checkout.index', compact('paymentMethods'));
    }

    public function store(OrderRequest $request)
    {
        $order = new Order;

        $this->saveData($order, $request);

        $this->paymentGateway->setPaymentMethodId($request->paymentMethodId);

        $this->paymentGateway->setTotal($order->total_price);

        $response = $this->paymentGateway->execute();

        return redirect($this->paymentGateway->getPaymentUrl($response));
    }

    public function success()
    {
        return redirect()->route('site.cart.index')
            ->with(['success' => 'Payment Process Is Success :)']);
    }

    public function cancel()
    {
        return redirect()->route('site.checkout.index')
            ->withErrors('Payment Process Is Failed');
    }

    private function setPaymentData()
    {
        $this->paymentGateway->setTotal(Cart::getTotal());

        $this->paymentGateway->setCurrency('KWD');

        $this->paymentGateway->setSuccessUrl(route('site.checkout.success'));

        $this->paymentGateway->setCancelUrl(route('site.checkout.cancel'));
    }

}

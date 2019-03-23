<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    private $public_key = 'i57189324544';
    private $private_key = '24XWCbNXMj61naXN3sAIqZxt9g6j52uLtObEDReb';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value = $request->value;
        $currency = $request->currency;
        $description = $request->description;

        $payment = Payment::create([
            'status' => 'Не оплачено',
            'value' => $value,
            'currency' => $currency,
            'description' => $description,
            'user_id' => Auth::user()->id,
        ]);

        $json_string = [
            "public_key" => $this->public_key,
            "version" => "3",
            "action" => "pay",
            "amount" => $value,
            "currency" => $currency,
            "description" => $description,
            "order_id" => $payment->id,
            "server_url" => "http://8bfbdfda.ngrok.io/TestApp/public/payment/update_call_back"
        ];

        $data = base64_encode(json_encode($json_string));

        $sign_string = base64_encode(sha1($this->private_key . $data . $this->private_key, True));

        return view('payments.store')->with([
            'payment' => $payment,
            'data' => $data,
            'signature' => $sign_string,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function updatePaymentCallBack(Request $request)
    {
        try {
            $sign = base64_encode(sha1($this->private_key . $request->data . $this->private_key , 1));

            if ($sign == $request->signature) {
                
                $data = json_decode(base64_decode($request->data));
                
                $payment = Payment::find($data->order_id);
                
                $payment->update([
                    'status' => $data->status,
                ]);
            }

        } catch (\Throwable $th) {
            Payment::find($data->order_id)->update([
                'status' => 'almost bad',
            ]);
        }

        return view('payments.verify')->with([
            'payment' => $payment,
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}

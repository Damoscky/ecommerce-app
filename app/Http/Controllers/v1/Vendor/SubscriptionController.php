<?php

namespace App\Http\Controllers\v1\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Responser\JsonResponser;
use App\Services\Paystack;
use App\Models\Card;
use App\Models\Subscription;
use GuzzleHttp\Exception\BadResponseException;
use Carbon\Carbon;
use App\Services\Transactions\Transactions;

class SubscriptionController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }
    /**
     * Subscribe to a plan
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {
        /**
         * Validate Data
         */
        $validate = $this->validateSubscription($request);
        /**
         * if validation fails
         */
        if ($validate->fails()) {
            return JsonResponser::send(true, "Validation Failed", $validate->errors()->all(), 400);
        }
        $data = $request->only("plan", "auto_renew");

        try {
            $data["start_date"] = Carbon::now()->format("Y-m-d");
            $data["end_date"] = Carbon::now()->addMonth()->format("Y-m-d");

            // validate reference number
            if ($request->plan !== "basic") {

                $paystack = new Paystack();
                $result = $paystack->getPaymentData();

                if ($result["data"]["status"] !== "success") {
                    return JsonResponser::send(true, "Transaction not successful", [], 400);
                }

                // store card details for recuring payment
                $card = $this->card($result);
                $trx = [
                    "card_id" => $card->id,
                    "user_id" => $this->user->id,
                    "plan" => $data["plan"],
                    "paidAt" => Carbon::parse($result["data"]["paid_at"])->format("Y-m-d H:i:s"),
                    "initializedAt" => Carbon::parse($result["data"]["created_at"])->format("Y-m-d H:i:s")
                ];
                $transactionData = array_merge($result["data"], $trx);
                Transactions::create($transactionData);
            }
            $data["total_products"] = $data["plan"] == "premium" ? "unlimited" : ($data["plan"] == "standard" ? 5 : 1);
            $data["status"] = "active";

            $sub = Subscription::updateOrCreate(["user_id" => $this->user->id], $data);

            return JsonResponser::send(false, "Subscription successful", $sub);
        } catch (BadResponseException $e) {
            logger($e);
            return JsonResponser::send(true, $e->getResponse()->getBody(true), [], $e->getCode());
        } catch (\Throwable $th) {
            logger($th);
            return JsonResponser::send(true, "Internal server error", [], 500);
        }
    }

    /**
     * Store users card
     */
    protected function card($data)
    {
        $cardData = [
            "email" =>  $data["data"]["customer"]["email"],
            "user_id" => $this->user->id
        ];
        $cardData = array_merge($cardData, $data["data"]["authorization"]);

        return Card::firstOrCreate(
            [
                "email" => $cardData["email"],
                "signature" => $cardData["signature"]
            ],
            [
                "user_id" => $cardData["user_id"],
                "authorization_code" => $cardData["authorization_code"],
                "bin" => $cardData["bin"],
                "last4" => $cardData["last4"],
                "exp_month" => $cardData["exp_month"],
                "exp_year" => $cardData["exp_year"],
                "channel" => $cardData["channel"],
                "card_type" => $cardData["card_type"],
                "bank" => $cardData["bank"],
                "country_code" => $cardData["country_code"],
                "brand" => $cardData["brand"],
                "reusable" => $cardData["reusable"],
            ]
        );
    }

    /**
     * validation
     */
    public function validateSubscription(Request $request)
    {
        $rules = [
            'plan' => 'required|string|in:basic,standard,premium',
        ];

        if ($request->plan !== "basic") {
            $rules['trxref'] =  'required|string';
            $rules['auto_renew'] =  'required|boolean';
        }
        $validateSubscription = Validator::make($request->all(), $rules);
        return $validateSubscription;
    }
}

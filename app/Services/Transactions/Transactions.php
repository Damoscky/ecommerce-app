<?php

namespace App\Services\Transactions;

use App\Models\Transaction;

class Transactions
{
    public static function create($data)
    {
        Transaction::create([
            "user_id" => $data["user_id"],
            "card_id" => $data["card_id"],
            "reference" => $data["reference"],
            "channel" => $data["channel"],
            "currency" => $data["currency"],
            "amount" => $data["amount"],
            "status" => $data["status"],
            "plan" => $data["plan"],
            "gateway_response" => $data["gateway_response"],
            "paid_at" => $data["paidAt"],
            "initialized_at" => $data["initializedAt"],
            "fee" => $data["fees"],
        ]);
    }
}

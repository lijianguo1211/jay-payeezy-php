<?php
/**
 * Notes:
 * File name:${fILE_NAME}
 * Create by: Jay.Li
 * Created on: 2021/3/26 0026 16:51
 */

require_once __DIR__ . '/../vendor/autoload.php';

use JayPayeezy\Config;
use JayPayeezy\CreditCard;
use JayPayeezy\Token;
use JayPayeezy\Transaction;

$client = new Config();
$client->setApiKey("y2sdDUJ0gGnxTyQFUGqDrutPHQ7LbeCS");
$client->setApiSecret("3472aaf343dce18899ed72af1c9f98f5c8b0912c0bfe3defe97cf2d158c0f96f");
$client->setMerchantToken("fdoa-0e8a514fecf2a834e0613becce6e98b30e8a514fecf2a834");
$client->setUrl("https://api-qa.payeezy.com/v1/transactions");

$card_transaction = new CreditCard($client);

try {
    $response = $card_transaction->purchase(
        [
            "merchant_ref" => "Astonishing-Sale",
            "amount" => "1299",
            "currency_code" => "USD",
            "credit_card" => array(
                "type" => "visa",
                "cardholder_name" => "John Smith",
                "card_number" => "4788250000028291",
                "exp_date" => "1020",
                "cvv" => "123"
            )
        ]
    );
} catch (\JayPayeezy\PayeezyError $e) {
    //Expiry Date is invalid
}
echo "<pre>";
var_dump($response);
echo "</pre>";


$transaction = new Transaction($client);

try {
    $response = $transaction->doPrimaryTransaction(
        [
            "merchant_ref" => "Astonishing-Sale",
            "transaction_type" => "purchase",
            "method" => "credit_card",
            "amount" => "1299",
            "currency_code" => "USD",
            "credit_card" => array(
                "type" => "visa",
                "cardholder_name" => "John Smith",
                "card_number" => "4788250000028291",
                "exp_date" => "1020",
                "cvv" => "123"
            )
        ]
    );
} catch (\JayPayeezy\PayeezyError $e) {
}
echo "<pre>";
var_dump($response);
echo "</pre>";


$authorize_card_transaction = new CreditCard($client);

$authorize_response = $authorize_card_transaction->authorize(
    [
        "merchant_ref" => "Astonishing-Sale",
        "amount" => "1299",
        "currency_code" => "USD",
        "credit_card" => array(
            "type" => "visa",
            "cardholder_name" => "John Smith",
            "card_number" => "4788250000028291",
            "exp_date" => "1020",
            "cvv" => "123"
        )
    ]
);
echo "<pre>";
var_dump($authorize_response);
echo "</pre>";

$capture_card_transaction = new CreditCard($client);
try {
    $capture_response = $capture_card_transaction->capture(
        $authorize_response->transactionId,
        array(
            "amount" => "1200",
            "transaction_tag" => $authorize_response->transaction_tag,
            "merchant_ref" => "Astonishing-Sale",
            "currency_code" => "USD",
        )
    );
} catch (\JayPayeezy\PayeezyError $e) {
}
echo "<pre>";
var_dump($capture_response);
echo "</pre>";


$authorize_card_transaction = new Token($client);

try {
    $authorize_response = $authorize_card_transaction->authorize(
        [
            "merchant_ref" => "Astonishing-Sale",
            "transaction_type" => "authorize",
            "method" => "token",
            "amount" => "200",
            "currency_code" => "USD",
            "token" => array(
                "token_type" => "FDToken",
                "token_data" => array(
                    "type" => "visa",
                    "value" => "2537446225198291",
                    "cardholder_name" => "JohnSmith",
                    "exp_date" => "1030"
                )
            )
        ]
    );
} catch (\JayPayeezy\PayeezyError $e) {
}
echo "<pre>";
var_dump($authorize_response);
echo "</pre>";


$authorize_card_transaction = new Transaction($client);

try {
    $authorize_response = $authorize_card_transaction->doPrimaryTransaction(
        [
            "merchant_ref" => "Astonishing-Sale",
            "transaction_type" => "authorize",
            "method" => "credit_card",
            "amount" => "1299",
            "currency_code" => "USD",
            "credit_card" => array(
                "type" => "visa",
                "cardholder_name" => "John Smith",
                "card_number" => "4788250000028291",
                "exp_date" => "1020",
                "cvv" => "123"
            )
        ]
    );
} catch (\JayPayeezy\PayeezyError $e) {
}
echo "<pre>";
var_dump($authorize_response);
echo "</pre>";

$capture_card_transaction = new Transaction($client);
try {
    $capture_response = $capture_card_transaction->doSecondaryTransaction(
        $authorize_response->transaction_id,
        array(
            "transaction_type" => "capture",
            "method" => "credit_card",
            "amount" => "1200",
            "transaction_tag" => $authorize_response->transaction_tag,
            "merchant_ref" => "Astonishing-Sale",
            "currency_code" => "USD",
            //"split_shipment" => "",
        )
    );
} catch (\JayPayeezy\PayeezyError $e) {
}
echo "<pre>";
var_dump($capture_response);
echo "</pre>";


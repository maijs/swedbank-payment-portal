<?php

namespace SwedbankPaymentPortal;


use GuzzleHttp\Client;
use SwedbankPaymentPortal\CC\PaymentCardTransactionData;
use SwedbankPaymentPortal\SharedEntity\Type\TransactionResult;
use SwedbankPaymentPortal\Transaction\TransactionFrame;

/**
 * Class UrlCallback can be used instead of custom CallbackInterface implementation.
 * This callback will call HTTP POST method to a given URL with these POST parameters:
 * "status" - one of these values: "SUCCESS" | "FAIL" | "UNFINISHED"
 *
 * You should add your orderID into URL to find out which exactly order was finished.
 *
 * @package SwedbankPaymentPortal
 */
class UrlCallback implements CallbackInterface
{
    private $url;

    /**
     * @param string $url
     * @return UrlCallback
     */
    public static function create($url)
    {
        return new self($url);
    }

    /**
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function handleFinishedTransaction(
        TransactionResult $transactionResult,
        TransactionFrame $transactionFrame,
        PaymentCardTransactionData $paymentCardTransactionData = null
    ) {
        $httpClient = new Client();
        $httpClient->post(
            $this->url,
            [
                'form_params' => [
                    'status' => $transactionResult->id(),
                    'card_data' => $paymentCardTransactionData ? json_encode($paymentCardTransactionData->toArray()) : ''
                ]
            ]
        );
    }

    public function serialize()
    {
        return json_encode(['url' => $this->url]);
    }

    public function unserialize($serialized)
    {
        $data = json_decode($serialized);

        $this->url = $data->url;
    }
}
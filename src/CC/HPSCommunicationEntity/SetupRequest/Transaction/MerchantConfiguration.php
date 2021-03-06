<?php

namespace SwedbankPaymentPortal\CC\HPSCommunicationEntity\SetupRequest\Transaction;

use Jms\Serializer\Annotation;
use SwedbankPaymentPortal\CC\Type\TransactionChannel;

/**
 * The container for the merchant configuration.
 *
 * @Annotation\AccessType("public_method")
 */
class MerchantConfiguration
{
    /**
     * The title of the customer associated to the payment, for example Mr, Mrs or Miss.
     *
     * @var TransactionChannel
     *
     * @Annotation\Type("SwedbankPaymentPortal\CC\Type\TransactionChannel")
     * @Annotation\SerializedName("channel")
     */
    private $channel;

    /**
     * This represents the location of stores or outlets or geographical location of the legal entity.
     *
     * @var string
     *
     * @Annotation\XmlElement(cdata=false)
     * @Annotation\Type("string")
     * @Annotation\SerializedName("merchant_location")
     */
    private $merchantLocation;

    /**
     * MerchantConfiguration constructor.
     *
     * @param TransactionChannel $channel
     * @param string             $merchantLocation
     */
    public function __construct(TransactionChannel $channel, $merchantLocation)
    {
        $this->channel = $channel;
        $this->merchantLocation = $merchantLocation;
    }

    /**
     * Channel getter.
     *
     * @return TransactionChannel
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Channel setter.
     *
     * @param TransactionChannel $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    /**
     * MerchantLocation getter.
     *
     * @return string
     */
    public function getMerchantLocation()
    {
        return $this->merchantLocation;
    }

    /**
     * MerchantLocation setter.
     *
     * @param string $merchantLocation
     */
    public function setMerchantLocation($merchantLocation)
    {
        $this->merchantLocation = $merchantLocation;
    }
}

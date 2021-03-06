<?php

namespace SwedbankPaymentPortal\CC\HCCCommunicationEntity\HCCQueryRequest;

use SwedbankPaymentPortal\CC\HCCCommunicationEntity\HCCQueryRequest\Transaction\HistoricTxn;
use JMS\Serializer\Annotation;

/**
 * Class HPSQueryRequest.
 *
 * @Annotation\AccessType("public_method")
 */
class Transaction
{
    /**
     * The container for Gateway authentication.
     *
     * @var HistoricTxn
     *
     * @Annotation\SerializedName("HistoricTxn")
     * @Annotation\Type("SwedbankPaymentPortal\CC\HCCCommunicationEntity\HCCQueryRequest\Transaction\HistoricTxn")
     */
    private $historicTxn;

    /**
     * Transaction constructor.
     *
     * @param HistoricTxn $historicTxn
     */
    public function __construct(HistoricTxn $historicTxn)
    {
        $this->historicTxn = $historicTxn;
    }

    /**
     * HistoricTxn getter.
     *
     * @return HistoricTxn
     */
    public function getHistoricTxn()
    {
        return $this->historicTxn;
    }

    /**
     * HistoricTxn setter.
     *
     * @param HistoricTxn $historicTxn
     */
    public function setHistoricTxn($historicTxn)
    {
        $this->historicTxn = $historicTxn;
    }
}

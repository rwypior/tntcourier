<?php

namespace RWypior\TNTCourier\Response;

use RWypior\TNTCourier\Exception\CourierException;
use RWypior\TNTCourier\Model\Status;
use RWypior\TNTCourier\ResponseInterface;

class TrackResponse implements ResponseInterface
{
    private $statuses;

    /**
     * TrackResponse constructor.
     * @param Status[] $statuses
     */
    protected function __construct(array $statuses)
    {
        $this->statuses = $statuses;
    }

    public static function createResponse($data) : ResponseInterface
    {
        try
        {
            $xml = new \SimpleXMLElement($data);
        }
        catch (\Exception $ex)
        {
            throw new CourierException("Failed to parse response XML", 0, $ex);
        }

        $res = $xml->xpath('/TrackResponse/Consignment');

        $statuses = [];
        foreach ($res as $entry) {
            $number = $entry->xpath('ConsignmentNumber')[0]->__toString();
            $status = $entry->xpath('SummaryCode')[0]->__toString();
            $statuses[$number] = new Status($number, $status);
        }

        return new TrackResponse($statuses);
    }

    /**
     * @return \RWypior\TNTCourier\Model\Status[]
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * @param $number
     * @return null|Status
     */
    public function getStatus($number)
    {
        return isset($this->statuses[$number]) ? $this->statuses[$number] : NULL;
    }
}
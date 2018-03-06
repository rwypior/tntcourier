<?php

namespace RWypior\TNTCourier;

use RWypior\TNTCourier\Exception\CourierException;

class TNT
{
    const USER_AGENT = 'ShipperGate_socket/1.0';

    private $guzzle;
    
    public function __construct()
    {
        $this->guzzle = new \GuzzleHttp\Client;
    }

    private function createOptionsArray(RequestInterface $request)
    {
        $arr = [
            'body' => $request->format(),
            'headers' => [
                'User-Agent' => self::USER_AGENT,
                'Content-Type' => 'application/x-www-form-urlencoded'
            ]
        ];

        if ($request instanceof AdvancedRequestInterface)
            $arr['headers'] = array_merge($arr['headers'], $request->getHeaders());

        return $arr;
    }

    /**
     * Send TNT request
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws CourierException
     */
    public function sendRequest(RequestInterface $request) : ResponseInterface
    {
        try
        {
            $options = $this->createOptionsArray($request);
            $res = $this->guzzle->request($request->getMethod(), $request->getTarget(), $options);
        }
        catch (\GuzzleHttp\Exception\ClientException $ex)
        {
            $code = $ex->getResponse()->getStatusCode();
            throw new CourierException("Request failed with code $code", CourierException::EXCCODE_REQUEST_FAILED, $ex, $request);
        }
        catch (\GuzzleHttp\Exception\ConnectException $ex)
        {
            // This can mean that TNT firewall does not allow your IP address
            throw new CourierException('Could not connect to courier API', CourierException::EXCCODE_CONNECTION_FAILED, $ex, $request);
        }
        catch (\Exception $ex)
        {
            throw new CourierException('Could not send TNT request', CourierException::EXCCODE_UNKNOWN_ERROR, $ex, $request);
        }

        $expectedResponseClass = $request->getExpectedResponse();
        return $expectedResponseClass::createResponse($res->getBody()->getContents());
    }
}
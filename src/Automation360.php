<?php

namespace Sendpulse\RestApi;

use Exception;

class Automation360
{
    /**
     * @var string
     */
    private $eventHash;
    /**
     * @var string
     */
    private $eventDomain = 'https://events.sendpulse.com/events/id/';

    /**
     * Automation360 constructor.
     * @param string $eventHash
     * @throws Exception
     */
    public function __construct($eventHash)
    {
        if (!$eventHash) {
            throw new Exception('Invalid parameter $eventHash', 500);
        }
        $this->eventHash = $eventHash;
    }

    /**
     * One of the variables $email or $phone
     * must necessarily contain the correct value
     *
     * @param null|string $email
     * @param null|string $phone
     * @param array $variables
     * @return array
     * @throws Exception
     */
    public function sendEventToSendpulse($email = null, $phone = null, array $variables = [])
    {
        if (!$email && !$phone) {
            throw new \Exception('Variables $email and $phone is empty', 500);
        }
        if ($email) {
            $variables['email'] = $email;
        }
        if ($phone) {
            $variables['phone'] = $phone;
        }
        return $this->sendRequest($variables);
    }

    /**
     * Send request to SendPulse with CURL
     *
     * @param array $variables
     * @return array
     */
    private function sendRequest(array $variables)
    {
        $url = $this->eventDomain . $this->eventHash;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, count($variables));
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($variables));
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 15);
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        $response = curl_exec($curl);
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $headerCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $responseBody = substr($response, $header_size);
        curl_close($curl);

        $result = [
            'http_code' => $headerCode,
            'data' => json_decode($responseBody, true)
        ];

        return $result;
    }
}
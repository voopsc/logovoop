<?php

namespace Logovoop;

class Telelog
{
    /**
     * @var string $token default token which givven by botFather
     */
    private $token;

    /**
     * Constructor for class
     *
     * @param string $token
     */
    public function __contsruct($token)
    {
        $this->token = $token;
        $this->requestURI = 'https://api.telegram.org/bot'.$this->token;
    }

    public function sendRequest()
    {
        $url = $this->requestURI . '/getMe';

// Create a new cURL resource
        $ch = curl_init($url);

// Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
        $result = curl_exec($ch);

// Close cURL resource
        curl_close($ch);
        return $result;
    }


}

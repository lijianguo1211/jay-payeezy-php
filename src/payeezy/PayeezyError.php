<?php

namespace JayPayeezy;

class PayeezyError extends \Exception
{

    private $httpStatus;

    private $httpBody;

    private $jsonBody;

    public function __construct($correlationId, $errorResponse)
    {
        $this->httpStatus = $correlationId;
        $httpBodyArray = array();
        foreach ($errorResponse->messages as $message) {
          $httpBodyArray[] = $message->description;
        }
        $this->httpBody = implode(", ", $httpBodyArray);
        $this->jsonBody = json_encode($errorResponse, JSON_FORCE_OBJECT);

        parent::__construct($this->httpBody);
    }

    public function getHttpStatus():int
    {
        return $this->httpStatus;
    }

    public function getHttpBody():string
    {
        return $this->httpBody;
    }

    public function getJsonBody():string
    {
        return $this->jsonBody;
    }
}

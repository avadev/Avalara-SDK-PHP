<?php
namespace Avalara\SDK\Utils;

class LogObject
{
    private $startTime;
    private $logRequestAndResponse;
    public $httpMethod;
    public $headerCorrelationId;
    public $requestDetails;
    public $responseDetails;
    public $requestURI;
    public $totalExecutionTime;
    public $statusCode;
    public $timestamp;
    public $exceptionMessage;

    public function __construct(
        bool $logRequestAndResponse = false
    ) {
        $this->logRequestAndResponse = $logRequestAndResponse;
    }

    public function populateRequestInfo($request)
    {
        $this->startTime = microtime(true);
        $this->timestamp = gmdate("Y/m/d H:i:s");
        $this->httpMethod = $request->getMethod();
        $this->requestURI = (string) $request->getUri();
        if($this->logRequestAndResponse)
        {
            $this->requestDetails = (string) $request->getBody();
        }
    }

    public function populateResponseInfo($jsonBody, $response)
    {
        $this->populateCommonResponseInfo($response);
        if($this->logRequestAndResponse)
        {
            $this->responseDetails = $jsonBody;
        }
    }

    public function populateErrorInfo($response)
    {
        $this->populateCommonResponseInfo($response);
        $this->exceptionMessage = (string) $response->getBody();
    }

    public function populateErrorMessage($statusCode, $errorMessage)
    {
        $this->populateTotalExecutionTime();
        $this->statusCode = $errorMessage;
        $this->exceptionMessage = $errorMessage;
    }

    private function populateCommonResponseInfo($response)
    {
        $this->populateTotalExecutionTime();
        $this->headerCorrelationId = $response->getHeader('x-correlation-id')[0];
        $this->statusCode = $response->getStatusCode();
    }

    private function populateTotalExecutionTime() 
    {
        $time_elapsed_secs = microtime(true) - $this->startTime;
        $milliseconds = round($time_elapsed_secs * 1000);
        $this->totalExecutionTime = $milliseconds; 
    }    
}
?>
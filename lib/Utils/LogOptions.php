<?php
namespace Avalara\SDK\Utils;

use Psr\Log\LoggerInterface;

class LogOptions
{
    public $logRequestAndResponse;
    public $logger;

    public function __construct(
        bool $logRequestAndResponse = false,
        \Psr\Log\LoggerInterface $logger = null
    ) {
        $this->logRequestAndResponse = $logRequestAndResponse;
        $this->logger = $logger;
    }
}
?>
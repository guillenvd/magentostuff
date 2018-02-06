<?php

namespace Training\CurrencyConverter\Controller\Converter;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\HTTP\ClientFactory;
use Magento\Framework\Controller\Result\JsonFactory;

class Convert extends \Magento\Framework\App\Action\Action
{
    protected $clientFactory;
    protected $jsonFactory;

    public function __construct(Context $context, ClientFactory $clientFactory, JsonFactory $jsonFactory)
    {
        $this->clientFactory = $clientFactory;
        $this->jsonFactory = $jsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $amount = $this->getRequest()->getParam('amount');
        $from = $this->getRequest()->getParam('from');
        $to = $this->getRequest()->getParam('to');

        $google_url = 'https://finance.google.com/finance/converter?a=%d&from=%s&to=%s';
        $url = sprintf($google_url, $amount, $from, $to);
        $client = $this->clientFactory->create();
        $client->get($url);
        $response = $client->getBody();
        if (preg_match("%<span class=bld>(\d+\.\d+).*?</span>%", $response, $m)) {
            $value = $m[1];
            $ret = [
                'amount' => $amount,
                'from' => $from,
                'to' => $to,
                'result' => $value
            ];

            $result = $this->jsonFactory->create();
            return $result->setData($ret);

        }
        else {
            throw new \Exception(__('No result'));
        }
    }
}
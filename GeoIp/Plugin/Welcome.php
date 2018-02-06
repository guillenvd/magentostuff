<?php

namespace Training\GeoIp\Plugin;

use Training\GeoIp\Model\GeoIpData;
 
class Welcome {

	private $geoIpFactory;

	public function __construct(\Training\GeoIp\Model\GeoIpFactory $geoIpFactory)
    {
       $this->geoIpFactory = $geoIpFactory;
    }

    public function afterGetWelcome(\Magento\Theme\Block\Html\Header $subject, $result)
    {
    	$geoIpData = $this->geoIpFactory->create();
        $message = "";
    	$ip = "184.154.83.119";
    	/** @var \Training\GeoIp\Model\GeoIpData $geoIpItem */
        $geoIpItem = $geoIpData->getCollection()->getItemByColumnValue('IP',$ip);
        if (is_null($geoIpItem)) {
            $url = sprintf('http://freegeoip.net/json/%s', $ip);
            $response = file_get_contents($url);
            $response = json_decode($response,TRUE);
            $geoIpCity = $response["city"];

            /** @var \Training\GeoIp\Model\GeoIpData $geoCityItem */
            $geoCityItem = $geoIpData->getCollection()->getItemByColumnValue('city', $geoIpCity);
            if (is_null($geoCityItem)) {
                $geoIpData->addData(['city' => $geoIpCity,
                    'message' => 'Hello, ' . $geoIpCity,
                    'IP' => $ip]);
                $geoIpData->save();
            } else {
                $geoCityItem->setData('IP', $ip);
                $geoCityItem->save();
            }

            $message = 'Hello, ' . $geoIpCity;
        } else {
            $message = $geoIpItem->getData()['message'];
        }

        return $message;
    }
}
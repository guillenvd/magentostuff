<?php
 
namespace Training\GeoIp\Api\Data;
 
use Magento\Framework\Api\ExtensibleDataInterface;
 
interface GeoIpInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId();
 
    /**
     * @param int $id
     * @return void
     */
    public function setId($id);
 
    /**
     * @return int
     */
    public function getCity();
    /**
     * @param text $city
     * @return void
     */
    public function setCity($city);

    /**
     * @return text
     */
    public function getMessage();
    /**
     * @param text $message
     * @return void
     */
    public function setMessage($message);

    /**
     * @return text
     */
    public function getIP();
    /**
     * @param text $IP
     * @return void
     */
    public function setIP($message);


}
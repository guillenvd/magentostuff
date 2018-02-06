<?php
 
namespace Training\GeoIp\Model;
 
use Magento\Framework\Model\AbstractExtensibleModel;
use Training\GeoIp\Api\Data\GeoIpInterface;
use Training\GeoIp\Model\ResourceModel\GeoIp\Collection;
 
class GeoIp extends AbstractExtensibleModel implements GeoIpInterface
{
    const ID = 'id';
    const CITY = 'city';
    const MESSAGE = 'message';
    const IP = 'IP';
 
    protected function _construct()
    {
        $this->_init(ResourceModel\GeoIp::class);
        $this->_init('Training\GeoIp\Model\ResourceModel\GeoIp');
    } 
 
    public function getId(){
        return $this->_getData(self::ID);
    }
 

    public function setId($id){
        $this->setData(self::ID);
    }
 
    public function getCity(){
        return $this->_getData(self::CITY);
    }
 

    public function setCity($city){
        $this->setData(self::CITY);
    }

    public function getMessage(){
        return $this->_getData(self::MESSAGE);
    }
 

    public function setMessage($message){
        $this->setData(self::MESSAGE);
    }
    public function getIP(){
        return $this->_getData(self::IP);
    }
 

    public function setIP($message){
        $this->setData(self::IP);
    }
}
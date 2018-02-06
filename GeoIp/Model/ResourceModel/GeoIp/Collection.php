<?php
 
namespace Training\GeoIp\Model\ResourceModel\GeoIp;
 
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
 
class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Training\GeoIp\Model\GeoIp',
            'Training\GeoIp\Model\ResourceModel\GeoIp'
        );
    }
}
<?php
 
namespace Training\GeoIp\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
 
class GeoIp extends AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('tjwombgeoip_data', 'id');
    }
}
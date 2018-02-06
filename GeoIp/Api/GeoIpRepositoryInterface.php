<?php

namespace Training\GeoIp\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Training\GeoIp\Api\Data\GeoIpInterface;


/**
 * Geo Ip interface.
 * @api
 */
interface GeoIpRepositoryInterface
{
/**
     * @param int $id
     * @return \Training\GeoIp\Api\Data\GeoIpInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);
 
    /**
     * @param \Training\GeoIp\Api\Data\GeoIpInterface $ip
     * @return \Training\GeoIp\Api\Data\GeoIpInterface
     */
    public function save(GeoIpInterface $ip);
 
    /**
     * @param \Training\GeoIp\Api\Data\GeoIpInterface $ip
     * @return void
     */
    public function delete(GeoIpInterface $ip);
 
}

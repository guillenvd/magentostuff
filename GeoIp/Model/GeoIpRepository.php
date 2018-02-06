<?php
 
namespace Training\GeoIp\Model;
 
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Training\GeoIp\Api\Data\GeoIpInterface;
use Training\GeoIp\Api\GeoIpRepositoryInterface;
use Training\GeoIp\Model\ResourceModel\GeoIpData\Collection as GeoIpDataCollectionFactory;
use Training\GeoIp\Model\ResourceModel\GeoIpData\Collection;
 
class GeoIpRepository implements GeoIpRepositoryInterface
{
    /**
     * @var GeoIp
     */
    private $GeoIpFactory;

    public function __construct(GeoIp $GeoIpFactory) {
        $this->GeoIpFactory = $GeoIpFactory;
    }
    public function getById($id)
    {
        $GeoIp = $this->GeoIpFactory->create();
        $GeoIp->getResource()->load($GeoIp, $id);
        if (! $GeoIp->getId()) {
            throw new NoSuchEntityException(__('Unable to find GeoIp with ID "%1"', $id));
        }
        return $GeoIp;
    }
     
    public function save(GeoIpInterface $GeoIp)
    {
        $GeoIp->getResource()->save($GeoIp);
        return $GeoIp;
    }
     
    public function delete(GeoIpInterface $GeoIp)
    {
        $GeoIp->getResource()->delete($GeoIp);
    }
 
}
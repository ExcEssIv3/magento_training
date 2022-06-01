<?php

namespace Training\Bookings\Ui\DataProvider\Booking;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\ReportingInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider;
use Training\Bookings\Model\ResourceModel\Booking\CollectionFactory;

class BookingDataProvider extends DataProvider {

    protected $collection;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $bookingCollectionFactory,
        ReportingInterface $reportingInterface,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        RequestInterface $request,
        FilterBuilder $filterBuilder,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $bookingCollectionFactory->create();
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $reportingInterface,
            $searchCriteriaBuilder,
            $request,
            $filterBuilder,
            $meta,
            $data);
    }

    public function getData() {
        return [];
    }
}

?>
<?php

namespace Training\Bookings\Plugin;

use Training\Bookings\Ui\DataProvider\Booking\ListingDataProvider as BookingDataProvider;
// use Magento\Eav\Api\AttributeRepositoryInterface;
// use Magento\Framework\App\ProductMetadataInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class AddAttributesToUiDataProvider {
    // private $attributeRepository;
    // private $productMetadata;

    public function afterGetSearchResult(BookingDataProvider $subject, SearchResult $result) {
        return $result;
    }
}

?>
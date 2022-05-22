<?php

namespace Training\Bookings\Model\ResourceModel\Booking;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\Bookings\Model\Booking as BookingModel;
use Training\Bookings\Model\ResourceModel\Booking as BookingResourceModel;

class Collection extends AbstractCollection {
    protected function _construct() {
        $this->_init(BookingModel::class, BookingResourceModel::class);
    }
}

?>
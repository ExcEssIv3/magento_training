<?php

namespace Training\Bookings\Model;

use Magento\Framework\Model\AbstractModel;
use Training\Bookings\Model\ResourceModel\Booking as BookingResourceModel;

class Booking extends AbstractModel {
    protected function _construct() {
        $this->_init(BookingResourceModel::class);
    }
}

?>
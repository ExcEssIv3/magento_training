<?php

namespace Training\Bookings\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Booking extends AbstractDb {
    protected function _construct() {
        $this->_init('training_bookings_bookings', 'id');
    }
}

?>
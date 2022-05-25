<?php

namespace Training\Bookings\Controller\Adminhtml\Listing;

use Training\Bookings\Controller\Adminhtml\Listing\Listing;

class Grid extends Listing {
    public function execute() {
        return $this->_resultPageFactory->create();
    }
}

?>
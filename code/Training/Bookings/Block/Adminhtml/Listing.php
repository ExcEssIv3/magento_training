<?php

namespace Training\Bookings\Block\Adminhtml;

use \Magento\Backend\Block\Widget\Grid\Container;

class Listing extends Container {
    protected function _construct() {
        $this->_controller = 'adminhtml_listing';
        $this->_blockGroup = 'Training_Bookings';
        $this->_headerText = __('Listings');
        $this->_addButtonLabel = __('Add New Booking');
        parent::_construct();
    }
}

?>
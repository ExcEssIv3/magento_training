<?php

namespace Training\Bookings\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface {
    protected $_bookingFactory;

    public function __construct(\Training\Bookings\Model\BookingFactory $bookingFactory) {
        $this->_bookingFactory = $bookingFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        $data = [
            'name' => 'Seth',
            'email' => 'sethr@dckap.com',
            'phone_no' => '0123456789'
        ];
        $booking = $this->_bookingFactory->create();
        $booking->addData($data)->save();
    }
}

?>
<?php

namespace Training\Bookings\Block;

use Magento\Framework\View\Element\Template;
use Training\Bookings\Model\ResourceModel\Booking\CollectionFactory;

class Index extends Template {
    protected $_bookingFactory;
    protected $_logger;

    public function __construct(
        Template\Context $context,
        CollectionFactory $bookingFactory,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->_logger = $logger;
        $this->_bookingFactory = $bookingFactory;
    }
    
    public function getData($key='',$index=null) {
        $booking = $this->_bookingFactory->create();
        $booking->resetData();
        $collection = $booking->getData();
        // $this->_logger->debug('data: ');
        // foreach ($collection as $data) {
        //     $this->_logger->debug(implode(',', $data));
        // }
        return $collection;
    }
}

?>
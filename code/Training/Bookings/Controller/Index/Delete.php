<?php

namespace Training\Bookings\Controller\Index;

use Magento\Framework\App\Action\HttpDeleteActionInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Delete implements HttpGetActionInterface {
    protected $_pageFactory;
    protected $_request;
    protected $_bookingResource;
    protected $_bookingFactory;

    public function __construct(
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\App\Request\Http $request,
        \Training\Bookings\Model\ResourceModel\Booking $bookingResource,
        \Training\Bookings\Model\BookingFactory $bookingFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_request = $request;
        $this->_bookingResource = $bookingResource;
        $this->_bookingFactory = $bookingFactory;
    }

    public function execute() {
        $resultPage = $this->_pageFactory->create();
        $id = $this->_request->getParam('id');
        $postData = $this->_bookingFactory->create();
        $result = $postData->setId($id);
        $this->_bookingResource->delete($result);
        $resultPage->getConfig()->getTitle()->prepend(__('Booking Deleted!'));

        return $resultPage;
    }
}

?>
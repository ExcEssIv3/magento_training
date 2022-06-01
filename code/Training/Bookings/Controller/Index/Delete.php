<?php

namespace Training\Bookings\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Delete implements HttpGetActionInterface {
    protected $_redirectFactory;
    protected $_request;
    protected $_bookingResource;
    protected $_bookingFactory;

    public function __construct(
        \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory,
        \Magento\Framework\App\Request\Http $request,
        \Training\Bookings\Model\ResourceModel\Booking $bookingResource,
        \Training\Bookings\Model\BookingFactory $bookingFactory
    ) {
        $this->_redirectFactory = $redirectFactory;
        $this->_request = $request;
        $this->_bookingResource = $bookingResource;
        $this->_bookingFactory = $bookingFactory;
    }

    public function execute() {
        $redirect = $this->_redirectFactory->create();
        $id = $this->_request->getParam('id');
        $postData = $this->_bookingFactory->create();
        $result = $postData->setId($id);
        $this->_bookingResource->delete($result);
        $redirect->setPath("*/*/index", ['save'=>1]);
        return $redirect;
    }
}

?>
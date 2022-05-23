<?php

namespace Training\Bookings\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;

class Save implements HttpPostActionInterface {
    protected $_request;
    protected $_redirectFactory;
    protected $_bookingResource;
    protected $_bookingFactory;

    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory,
        \Training\Bookings\Model\ResourceModel\Booking $bookingResource,
        \Training\Bookings\Model\BookingFactory $bookingFactory
    ) {
        $this->_request = $request;
        $this->_redirectFactory = $redirectFactory;
        $this->_bookingResource = $bookingResource;
        $this->_bookingFactory = $bookingFactory;
    }

    public function execute() {
        $redirect = $this->_redirectFactory->create();
        $input = $this->_request->getParams();
        $postData = $this->_bookingFactory->create();
        if ($input['id'] != "-1") {
            $this->_bookingResource->load($postData, $input['id']);
            $postData->addData($input);
            $this->_bookingResource->save($postData);
        } else {
            unset($input['id']);
            $postData->setData($input);
            $this->_bookingResource->save($postData);
        }
        $redirect->setPath('*/*/index', ['save'=>0]);
        return $redirect;
    }
}

?>
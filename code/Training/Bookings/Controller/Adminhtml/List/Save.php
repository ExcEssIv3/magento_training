<?php

namespace Training\Bookings\Controller\Adminhtml\List;

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
        \Training\Bookings\Model\BookingFactory $bookingFactory,
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
        $input['country'] = $input['country'][0];
        $postData->setData($input);
        $this->_bookingResource->save($postData);
        $redirect->setPath('*/*/index');
        return $redirect;
    }
}

?>
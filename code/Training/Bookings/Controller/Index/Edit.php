<?php

namespace Training\Bookings\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Edit implements HttpGetActionInterface {
    protected $_pageFactory;
    protected $_request;

    public function __construct(
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_request = $request;
    }

    public function execute() {
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Bookings'));
        return $resultPage;
    }
}

?>
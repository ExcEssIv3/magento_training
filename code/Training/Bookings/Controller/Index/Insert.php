<?php

namespace Training\Bookings\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Insert implements HttpGetActionInterface  {
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
    }

    public function execute() {
        return $this->_pageFactory->create();
    }
}

?>
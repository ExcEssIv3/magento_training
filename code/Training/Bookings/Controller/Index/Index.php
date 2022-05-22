<?php

namespace Training\Bookings\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Index implements HttpGetActionInterface {
    protected $_resultPageFactory;
    protected $_logger;

    public function __construct(
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_logger = $logger;
    }

    public function execute() {
        $this->_logger->debug("Index execute");
        return $this->_resultPageFactory->create();
    }
}

?>
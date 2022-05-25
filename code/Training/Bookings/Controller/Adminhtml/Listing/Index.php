<?php

namespace Training\Bookings\Controller\Adminhtml\Listing;

use Training\Bookings\Controller\Adminhtml\Listing\Listing;
use Training\Bookings\Model\BookingFactory;
use Magento\Backend\App\Action\Context;
// use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Index extends Listing {
    public function __construct(
        Context $context,
        // Registry $coreRegistry,
        PageFactory $resultPageFactory,
        BookingFactory $bookingFactory
    ) {
        parent::__construct($context, $resultPageFactory, $bookingFactory);
    }

    public function execute() {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }

        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu($this::MENU_ID);
        $resultPage->getConfig()->getTitle()->prepend(__('Listings'));

        return $resultPage;
    }
}

?>
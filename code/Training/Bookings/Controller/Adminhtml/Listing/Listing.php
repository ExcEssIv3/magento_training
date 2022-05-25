<?php

namespace Training\Bookings\Controller\Adminhtml\Listing;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
// use Magento\Framework\Registry;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Training\Bookings\Model\BookingFactory;

class Listing extends Action implements HttpGetActionInterface {
    const MENU_ID = 'Training_Bookings::bookings_listing';

    // protected $_coreRegistry;
    protected $_resultPageFactory;
    protected $_bookingFactory;

    public function __construct(
        Context $context,
        // Registry $coreRegistry,
        PageFactory $resultPageFactory,
        BookingFactory $bookingFactory
    ) {
        parent::__construct($context);
        // $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_bookingFactory = $bookingFactory;
    }

    public function execute() {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(static::MENU_ID);
        $resultPage->getConfig()->getTitle()->prepend(__('Listing'));

        return $resultPage;
    }
}

?>
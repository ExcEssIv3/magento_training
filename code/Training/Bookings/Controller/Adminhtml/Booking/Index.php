<?php

namespace Training\Bookings\Controller\Adminhtml\Booking;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action {
    const ADMIN_RESOURCE = 'Training_Bookings::Booking';

    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute() {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Training_Bookings::Booking');
        $resultPage->setBreadcrumb(__('Booking Data'), __('Booking Data'));
        $resultPage->getConfig()->getTitle()->prepend(__('Booking Data'));

        return $resultPage;
    }
}

?>
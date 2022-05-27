<?php

namespace Training\Bookings\Controller\Adminhtml\List;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface {
    const MENU_ID = 'Training_Bookings::bookings_list';

    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute() {
        // $resultPage = $this->resultPageFactory->create();
        // $resultPage->setActiveMenu(static::MENU_ID);
        // $resultPage->getConfig()->getTitle()->prepend(__('List'));

        $this->_view->loadLayout();
        $this->_view->renderLayout();

        // return $resultPage;
    }
}

?>
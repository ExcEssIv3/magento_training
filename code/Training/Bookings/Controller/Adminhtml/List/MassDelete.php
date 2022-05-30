<?php

namespace Training\Bookings\Controller\Adminhtml\List;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Training\Bookings\Model\ResourceModel\Booking\CollectionFactory;
use Training\Bookings\Model\ResourceModel\Booking;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;
use Magento\Ui\Component\MassAction\Filter;
// use 

class MassDelete extends Action implements HttpPostActionInterface {
    protected $_collectionFactory;
    protected $_bookingResource;
    protected $_filter;

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        Booking $bookingResource
    ) {
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        $this->_bookingResource = $bookingResource;
        parent::__construct($context);
    }

    public function execute(): Redirect {
        if (!$this->getRequest()->isPost()) {
            throw new NotFoundException(__('Page not found'));
        }
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        $bookingsDeleted = 0;
        foreach($collection->getItems() as $booking) {
            $this->_bookingResource->delete($booking);
            $bookingsDeleted++;
        }

        if ($bookingsDeleted) {
            $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $bookingsDeleted));
        }

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}

?>
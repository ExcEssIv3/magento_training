<?php

namespace Training\Bookings\Controller\Adminhtml\Listing;

use Training\Bookings\Controller\Adminhtml\Listing\Listing;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Training\Bookings\Model\BookingFactory;
use Training\Bookings\Model\ResourceModel\Booking;

use Psr\Log\LoggerInterface;

use function PHPUnit\Framework\isNull;

class MassDelete extends Listing implements HttpPostActionInterface {
    protected $_bookingResource;
    protected $_logger;

    public function __construct(
        Context $context,
        LoggerInterface $logger,
        PageFactory $resultPageFactory,
        BookingFactory $bookingFactory,
        Booking $bookingResource
    ) {
        parent::__construct($context, $resultPageFactory, $bookingFactory);

        $this->_bookingResource = $bookingResource;
        $this->_logger = $logger;
    }

    public function execute() {
        $bookingIds = $this->getRequest()->getParam('bookings');
        $this->_logger->debug("IDS: " . implode(", ", $bookingIds));
        $model = $this->_bookingFactory->create();
        if (!is_null($bookingIds)) {
            $i = 0;
            $this->_logger->debug("DEBUGGING BOOKING DELETE:");
            foreach ($bookingIds as $bookingId) {
                $this->_logger->debug("DELETE:" . $bookingId);

                try {
                    $this->_bookingResource->load($model, $bookingId);
                    $this->_bookingResource->delete($model);
                    $i++;
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage($e->getMessage());
                }
            }
            if ($i > 0) {
                $this->messageManager->addSuccessMessage(
                    __('%1 item(s) deleted.', $i)
                );
            }
        } else {
            $this->_logger->debug("Nullcase");
            $this->messageManager->addErrorMessage(
                __('Delete failed. Try again.')
            );
        }
        $this->_redirect('*/*/index');
    }
}

?>
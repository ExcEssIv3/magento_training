<?php

namespace Training\Bookings\Controller\Adminhtml\List;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Training\Bookings\Model\BookingFactory;
use Training\Bookings\Model\ResourceModel\Booking as BookingResource;

class InlineEdit extends Action {
    protected $_jsonFactory;
    private $_bookingFactory;
    private $_bookingResource;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        BookingFactory $bookingFactory,
        BookingResource $bookingResource,
    ) {
        parent::__construct($context);
        $this->_jsonFactory = $jsonFactory;
        $this->_bookingFactory = $bookingFactory;
        $this->_bookingResource = $bookingResource;
    }

    public function execute() {
        $resultJson = $this->_jsonFactory->create();
        $error = false;
        $messages = [];
        
        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);
            if (!count($postItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $modelid) {
                    $model = $this->_bookingFactory->create();
                    $this->_bookingResource->load($model, $modelid);
                    $postItems[$modelid]['country'] = $postItems[$modelid]['country'][0];
                    try {
                        $model->setData(array_merge($model->getData(), $postItems[$modelid]));
                        $this->_bookingResource->save($model);
                    } catch (\Exception $e) {
                        $messages[] = "[Error: {$modelid}] {$e->getMessage()}";
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
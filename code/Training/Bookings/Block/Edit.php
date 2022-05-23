<?php

namespace Training\Bookings\Block;

class Edit extends \Magento\Framework\View\Element\Template {
    protected $_pageFactory;
    protected $_coreRegistry;
    protected $_bookingCollectionFactory;
    protected $_helperData;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Training\Bookings\Model\ResourceModel\Booking\CollectionFactory $bookingCollectionFactory,
        \Training\Bookings\Helper\Data $helperData,
        array $data = []
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_bookingCollectionFactory = $bookingCollectionFactory;
        $this->_helperData = $helperData;
        return parent::__construct($context, $data);
    }

    public function execute() {
        return $this->_pageFactory->create();
    }

    private function filterId($datas, $id) {
        foreach ($datas as $data) {
            if ($data['id'] == $id) {
                return $data;
            }
        }
        return null;
    }

    public function getEnabled() {
        return $this->_helperData->getGeneralConfig('enable');
    }

    public function getDisableText() {
        return $this->_helperData->getGeneralConfig('disabletext');
    }

    public function getEditData() {
        $id = $this->getRequest()->getParam('id');
        $postData = $this->_bookingCollectionFactory->create();
        $result = $postData->load();
        $result = $this->filterId($result->getData(), $id);

        return $result;
    }
}

?>
<?php

namespace Training\Bookings\Block;

class Insert extends \Magento\Framework\View\Element\Template {
    protected $_pageFactory;
    protected $_postLoader;
    protected $_helperData;

    public function __construct(
        \Training\Bookings\Helper\Data $helperData,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_helperData = $helperData;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function getEnabled() {
        return $this->_helperData->getGeneralConfig('enable');
    }

    public function getDisableText() {
        return $this->_helperData->getGeneralConfig('disabletext');
    }

    public function execute() {
        return $this->_pageFactory->create();
    }
}

?>
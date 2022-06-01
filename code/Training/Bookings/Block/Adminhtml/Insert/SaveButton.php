<?php

namespace Training\Bookings\Block\Adminhtml\Insert;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Customer\Block\Adminhtml\Edit\GenericButton;


class SaveButton extends GenericButton implements ButtonProviderInterface {
    public function getButtonData() {
        return [
            'label' => __('Save Booking'),
            'class' => 'save primary',
            'data_attribute' => [
                'booking-init' => [
                    'button' => ['event' => 'save']],
                    'form-role' => 'save'
                ],
                'sort_order' => 90
            ];
    }

    public function getSaveUrl() {
        return $this->getUrl('*/*/save', []);
    }
}
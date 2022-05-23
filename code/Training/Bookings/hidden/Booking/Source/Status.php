<?php

namespace Training\Bookings\Model\Booking\Source;

class Status implements \Magento\Framework\Data\OptionSourceInterface {
    protected $booking;

    public function __construct(
        \Training\Bookings\Model\Booking $booking
    ){
        $this->booking = $booking;
    }

    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->getOptionArray();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }

    public static function getOptionArray()
    {
        return [
            1 => __('Enabled'),
            0 => __('Disabled')
        ];
    }
}
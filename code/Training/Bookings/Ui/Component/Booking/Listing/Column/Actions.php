<?php

namespace Training\Bookings\Ui\Component\Booking\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\Url;

class Actions extends Column
{
    protected $_urlBuilder;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Url $urlBuilder,
        $viewUrl = '',
        array $components = [],
        array $data = []
    ) {
        $this->_urlBuilder = $urlBuilder;
        $this->_viewUrl = $viewUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

//     public function prepareDataSource(array $dataSource) {
//         if (isset($dataSource['data']['items'])) {
//             foreach ($dataSource['data']['items'] as &$item) {
//                 $name = $this->getData('name');
//                 if (isset($item['id'])) {
//                     // $item[$name]['view'] = [
//                     //     'href' => $this->_urlBuilder->getUrl($this->_viewUrl, ['id' => $item['id']]),
//                     //     'target' => '_blank',
//                     //     'label' => __('View on Frontend')
//                     // ];
//                     $item[$name]['edit'] = [
//                         'href' => $this->_urlBuilder->getUrl(
//                             'bookings/index/edit',
//                             ['id' => $item['id']]
//                         ),
//                         'label' => __('Edit'),
//                         'hidden' => false
//                     ];
//                 }
//                 // $item[$this->getData('name')]['edit'] = [
//                 //     'href' => $this->_urlBuilder->getUrl(
//                 //         'bookings/list/edit',
//                 //         ['id' => $item['training_bookings_id']]
//                 //     ),
//                 //     'label' => __('Edit'),
//                 //     'hidden' => false,
//                 // ];
//                 // $item[$this->getData('name')]['delete'] = [
//                 //     'href' => $this->_urlBuilder->getUrl(
//                 //         'bookings/list/delete',
//                 //         ['id' => $item['training_bookings_id']]
//                 //     ),
//                 //     'label' => __('Delete'),
//                 //     'hidden' => false,
//                 // ];
//             }
//         }

//         return $dataSource;
//     }
}


?>
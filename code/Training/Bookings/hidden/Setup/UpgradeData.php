<?php
 
namespace Training\Bookings\Setup;
 
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
 
class UpgradeData implements UpgradeDataInterface
{
	protected $_bookingFactory;
 
	public function __construct(\Training\Bookings\Model\bookingFactory $bookingFactory)
	{
		$this->_bookingFactory = $bookingFactory;
	}
 
	public function upgrade(
		ModuleDataSetupInterface $setup,
		ModuleContextInterface $context
	) {
		if (version_compare($context->getVersion(), '1.0.1', '<')) {
			$data = [
				'name'    => "James",
				'email'	  => "jamesd@dckap.com",
				'phone_no'=> '1234567890',
			];
			$booking = $this->_bookingFactory->create();
			$booking->addData($data)->save();
		}
	}
}
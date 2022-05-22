<?php

namespace Training\Bookings\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface {
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();
        if(version_compare($context->getVersion(), '1.0.0', '<')) {
            if(!$installer->tableExists('training_bookings_bookings')) {
                $table = $installer->getConnection()->newTable(
                    $installer->getTable('training_bookings_bookings')
                )->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true,
                    ],
                    'ID'
                )->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Name'
                )->addColumn(
                    'email',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'Email'
                )->addColumn(
                    'phone_no',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [],
                    'Phone Number'
                )->setComment('Booking Table');
                $installer->getConnection()->createTable($table);
    
                $installer->getConnection()->addIndex(
                    $installer->getTable('training_bookings_bookings'),
                    $setup->getIdxName(
                        $installer->getTable('training_bookings_bookings'),
                        ['name', 'email'],
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['name', 'email'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                );
            }
        }
        
        $installer->endSetup();
    }
}

?>
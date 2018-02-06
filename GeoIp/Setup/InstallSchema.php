<?php
namespace Training\GeoIp\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;


class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $tableName = $installer->getTable('wombgeoip_data');

        if ($installer->getConnection()->isTableExists($tableName) != true) {
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn('id',Table::TYPE_INTEGER,null,['identity' => true,'unsigned' => true,'nullable' => false,'primary' => true], 'ID')
                ->addColumn('city',Table::TYPE_TEXT,null,['nullable' => false, 'default' => ''],'City')
                ->addColumn('message',Table::TYPE_TEXT,null,['nullable' => false, 'default' => ''],'Message');
            $installer->getConnection()->createTable($table);
        }

        $installer->endSetup();
    }
}
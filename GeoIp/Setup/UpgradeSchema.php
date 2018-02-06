<?php

	namespace Training\GeoIp\Setup;

	use Magento\Framework\Setup\UpgradeDataInterface;
	use Magento\Framework\Setup\ModuleDataSetupInterface;
	use Magento\Framework\Setup\ModuleContextInterface;

	class UpgradeData implements UpgradeDataInterface 
	{
		public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
		{
			$setup->startSetup();

			if (version_compare($context->getVersion(), '1.0.1') < 0) {
				$tableName = $setup->getTable('wombgeoip_data');

				if ($setup->getConnection()->isTableExists($tableName) == true) {
					$data = [
						[
							'city' => 'Tijuana',
							'message' => 'Hello, Tijuana'
						],
						[	
							'city' => 'Ensenada',
							'message' => 'Hello, Ensenada'
						],
						[
							'city' => 'Los Angeles',
							'message' => 'Hello, LA'
						]
					];

					foreach ($data as $item) {
						$setup->getConnection()->insert($tableName, $item);
					}
				}
			}

			if (version_compare($context->getVersion(), '1.0.2') < 0) {
				$setup->getConnection()->addColumn(
					$setup->getTable('wombgeoip_data'),
					'IP',
					[
						'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						'length' => 20,
						'nullable' => true,
						'comment' => 'IP'
					]
				);
			}

			$setup->endSetup();
		}
	}
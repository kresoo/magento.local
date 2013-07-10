<?php

$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()->newTable($installer->getTable('inchoo_gift/giftentity'))
            ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, 
                array(
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true,
                ),'Entity Id'
             )
             ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER,
                    null,
                    array(
                    'unsigned' => true,
                    'nullable' => false,
                    'default' => '0',
                    ),
                    'Customer Id'
                )
                ->addColumn('type_id', Varien_Db_Ddl_Table::TYPE_SMALLINT,
                    null,
                    array(
                    'unsigned' => true,
                    'nullable' => false,
                    'default' => '0',
                    ),
                    'Type Id'
                )
                ->addColumn('website_id', Varien_Db_Ddl_Table::TYPE_SMALLINT,
                    null,
                    array(
                    'unsigned' => true,
                    'nullable' => false,
                    'default' => '0',
                    ),
                    'Website Id'
                )
                ->addColumn('event_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255,
                    array(),
                    'Event Name'
                )
                ->addColumn('event_date', Varien_Db_Ddl_Table::TYPE_DATE,
                    null,
                    array(),
                    'Event Date'
                )
                ->addColumn('event_country', Varien_Db_Ddl_Table::TYPE_TEXT,
                    3,
                    array(),
                    'Event Country'
                )
                ->addColumn('event_location', Varien_Db_Ddl_Table::TYPE_TEXT,null,

                                array(),
                'Event Location'
                )
                ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
                null,
                array(
                'nullable' => false,
                ),
                'Created At');
$installer->getConnection()->createTable($table);

$installer->endSetup();



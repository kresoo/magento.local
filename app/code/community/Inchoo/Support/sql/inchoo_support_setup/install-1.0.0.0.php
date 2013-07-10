<?php

/*@var $installer Mage_Core_Model_Resource_Setup */

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
        ->newTable($installer->getTable('inchoo_support/inchoo_support_ticket'))
        ->addColumn('order_id', Varien_Db_Ddl_Table::TYPE_INTEGER,null,array(
            'nullable' => false,
            'identity' => true,
            'primary'  => true,
        ),"Ticket ID")
        ->addColumn('order', Varien_Db_Ddl_Table::TYPE_TEXT,null,array(
            'nullable' => false,
        ),"Order")
        ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT,null,array(
            'nullable' => false,
        ),"Users comment");

$installer->getConnection()->createTable($table);

$installer->endSetup();
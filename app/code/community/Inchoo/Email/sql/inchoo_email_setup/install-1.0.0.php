<?php

/*@var $installer Mage_Core_Model_Resource_Setup */

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
        ->newTable($installer->getTable('inchoo_email/email'))
        ->addColumn('email_id', Varien_Db_Ddl_Table::TYPE_INTEGER,null,array(
            'nullable' => false,
            'identity' => true,
            'primary' => true
        ),"Email ID")
        ->addColumn('receiver', Varien_Db_Ddl_Table::TYPE_VARCHAR,200,array(
            'nullable' => false,
        ),"Receiver")
        ->addColumn('email_body', Varien_Db_Ddl_Table::TYPE_TEXT,null,array(
            'nullable' => false,
        ),"Email body")
        ->addColumn('time_sent', Varien_Db_Ddl_Table::TYPE_TIMESTAMP,null,array(
            'nullable' => false,
        ),"Send time");

$installer->getConnection()->createTable($table);

$installer->endSetup();
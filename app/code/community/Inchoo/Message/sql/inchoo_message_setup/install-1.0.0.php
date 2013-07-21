<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
        ->newTable($installer->getTable('inchoo_message/message'))
        ->addColumn('message_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity' => true,
            'primary' => true,
            'nullable' => false
        ),"Message ID")
        ->addColumn('message_title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
            'nullable' => false
        ),"Message title")
        ->addColumn('message_body', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false
        ),"Message body");

$installer->getConnection()->createTable($table);

$installer->endSetup();
        
?>
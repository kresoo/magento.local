<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
        ->newTable($installer->getTable('inchoo_image/image'))
        ->addColumn('image_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity' => true,
            'primary' => true,
            'nullable' => false
        ),"Image ID")
        ->addColumn('user_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'nullable' => false
        ),"User ID")
        ->addColumn('image_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
            'nullable' => false
        ),"Image name")
        ->addColumn('image_title', Varien_Db_Ddl_Table::TYPE_VARCHAR,50 , array(
            'nullable' => false
        ),"Image title");

$installer->getConnection()->createTable($table);

$installer->endSetup();

?>

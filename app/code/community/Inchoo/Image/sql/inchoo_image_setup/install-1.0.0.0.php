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
        ->addColumn('image_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'nullable' => false
        ),"Image name");

$installer->getConnection()->creteTable($table);

$installer->endSetup();

?>

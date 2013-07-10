<?php
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
        ->newTable($installer->getTable('inchoo_checkout/order'))
        ->addColumn('order_id', Varien_Db_Ddl_Table::TYPE_INTEGER,null,array(
            'nullable' => false,
            'primary'  => true,
            'identity' => true,
        ),"Quote ID")
        ->addColumn('key', Varien_Db_Ddl_Table::TYPE_VARCHAR,null,array(
            'nullable' => false,
        ),"Key")
        ->addColumn('value', Varien_Db_Ddl_Table::TYPE_TEXT,null,array(
            'nullable' => false,
        ), "Comment");


$installer->getConnection()->createTable($table);

$installer->endSetup();
?>

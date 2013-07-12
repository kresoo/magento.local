<?php
//$installer = $this;
//
//$installer->startSetup();
//
//$table = $installer->getConnection()
//        ->newTable($installer->getTable('inchoo_image/inchooimage'))
//        ->addColumn('image_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
//            'identity' => true,
//            'primary' => true,
//            'nullable' => false
//        ),"Image ID")
//        ->addColumn('user_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
//            'nullable' => false
//        ),"User ID")
//        ->addColumn('image_path', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
//            'nullable' => false
//        ),"Image path");
//
//$installer->getConnection()->creteTable($table);
//
//$installer->endSetup();
echo 'Running This Upgrade: '.get_class($this)."\n <br /> \n";
die("Exit for now");
?>

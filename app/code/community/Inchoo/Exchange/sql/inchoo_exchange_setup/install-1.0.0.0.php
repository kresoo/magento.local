<?php

/*@var $installer Mage_Core_Model_Resource_Setup */

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
        ->newTable($installer->getTable('inchoo_exchange/exchangerate'))
        ->addColumn('exrate_id', Varien_Db_Ddl_Table::TYPE_INTEGER,null,array(
            'nullable' => false,
            'identity' => true,
            'primary' => true
        ),"Država")
        ->addColumn('drzava', Varien_Db_Ddl_Table::TYPE_VARCHAR,null,array(
            'nullable' => false,
        ),"Država")
        ->addColumn('sifra', Varien_Db_Ddl_Table::TYPE_INTEGER,null,array(
            'nullable' => false,
        ),"Order")
        ->addColumn('valuta', Varien_Db_Ddl_Table::TYPE_VARCHAR,null,array(
            'nullable' => false,
        ),"Users comment")
        ->addColumn('jedinica', Varien_Db_Ddl_Table::TYPE_INTEGER,null,array(
            'nullable' => false,
        ),"Users comment")
        ->addColumn('kupovni', Varien_Db_Ddl_Table::TYPE_DECIMAL,'12,4',array(
            'nullable' => false,
        ),"Users comment")
        ->addColumn('srednji', Varien_Db_Ddl_Table::TYPE_DECIMAL,'12,4',array(
            'nullable' => false,
        ),"Users comment")
         ->addColumn('prodajni', Varien_Db_Ddl_Table::TYPE_DECIMAL,'12,4',array(
            'nullable' => false,
        ),"Users comment");

$installer->getConnection()->createTable($table);

$installer->endSetup();
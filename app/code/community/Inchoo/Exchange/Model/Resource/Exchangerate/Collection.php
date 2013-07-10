<?php

class Inchoo_Exchange_Model_Resource_Exchangerate_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('inchoo_exchange/exchangerate');
    }
}
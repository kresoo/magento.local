<?php

class Inchoo_Gift_Model_Resource_Giftentity_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('inchoo_gift/giftentity');
        parent::_construct();
    }
}
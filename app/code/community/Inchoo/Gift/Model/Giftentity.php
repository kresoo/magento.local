<?php

class Inchoo_Gift_Model_Giftentity extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        $this->_init('inchoo_gift/giftentity');
        parent::_construct();
    }
}
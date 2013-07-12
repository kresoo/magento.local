    <?php

class Inchoo_Gift_Model_Resource_Giftentity extends Mage_Core_Model_Resource_Abstract
{
    public function _construct() 
    {
        $this->_init('inchoo_gift/giftentity', 'entity_id');
    }
}
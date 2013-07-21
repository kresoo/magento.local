<?php

class Inchoo_Message_Model_Resource_Message extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('inchoo_message/message', 'message_id');
    }
}

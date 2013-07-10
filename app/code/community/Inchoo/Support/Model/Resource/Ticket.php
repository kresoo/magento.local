<?php

class Inchoo_Support_Model_Resource_Ticket extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('inchoo_support/inchoo_support_ticket', 'ticket_id');
    }
}
<?php

class Inchoo_Support_Helper_Data extends Mage_Core_Helper_Abstract
{
    const TICKET_RESOLVED_FALSE = 0;
    const TICKET_RESOLVED_TRUE = 1;
    
    public function getResolvedOptions()
    {
        return array(
            self::TICKET_RESOLVED_FALSE => $this->__('No'),
            self::TICKET_RESOLVED_TRUE => $this->__('Yes'),
        );
    }
}
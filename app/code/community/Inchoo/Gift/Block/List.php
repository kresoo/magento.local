<?php

class Inchoo_Gift_Block_List extends Mage_Core_Block_Template
{
    
    public function getCustomerRegistries()
    {
        $colletion = null;
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        
        if($customer){
            $colletion = Mage::getModel('inchoo_gift/giftentity')->getCollection()->addFieldToFilter('customer_id',$customer->getId());
        }
        return $colletion;
    }
}


<?php

class Inchoo_Image_Block_ViewImage extends Mage_Core_Block_Template
{
    public function getImagesByUserId()
    {
        $user_id = Mage::getSingleton('customer/session')->getCustomer()->getId();
        $images = Mage::getModel('inchoo_image/image')->getCollection()->addFieldToFilter('user_id', array('eq' => $user_id));
        return $images;          
    }
}

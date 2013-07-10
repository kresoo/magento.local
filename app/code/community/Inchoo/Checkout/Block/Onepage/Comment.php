<?php

class Inchoo_Checkout_Block_Onepage_Comment extends Mage_Checkout_Block_Onepage_Abstract
{
    protected function _construct()
    {    
        $this->getCheckout()->setStepData('comment', array(
            'label'     => Mage::helper('checkout')->__('Leave a comment'),
            'is_show'   => $this->isShow()
        ));
        
        parent::_construct();
    }
}
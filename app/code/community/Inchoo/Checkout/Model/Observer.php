<?php

class Inchoo_Checkout_Model_Observer {

    public function saveOrderAfter() {
        $comment = Mage::getSingleton('core/session')->getComment();
        $order_id = Mage::getSingleton('checkout/session')->getLastRealOrderId();
        
        Mage::getModel('inchoo_checkout/order')
                ->setKey($order_id)
                ->setValue($comment['like'])
                ->save();
        
        unset(Mage::getSingleton('core/session')->getComment());
    }
    
    

}


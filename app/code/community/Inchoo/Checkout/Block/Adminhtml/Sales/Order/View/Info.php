<?php

class Inchoo_Checkout_Block_Adminhtml_Sales_Order_View_Info extends Mage_Adminhtml_Block_Sales_Order_View_Info {

    public function getComments() {
        $_order = $this->getOrder();
        $order_id = $_order->getRealOrderId();
        $comments = Mage::getModel('inchoo_checkout/order')->getCollection()->addFieldToFilter('main_table.key', $order_id);
        return $comments;
    }

}


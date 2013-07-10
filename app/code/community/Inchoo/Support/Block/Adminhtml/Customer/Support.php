<?php

class Inchoo_Support_Block_Adminhtml_Customer_Support extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct() {
        $this->_blockGroup = 'inchoo_support';
        $this->_controller = 'adminhtml_customer_support';
        $this->_headerText = Mage::helper('inchoo_support')->__('Support ticket');
        parent::__construct();
        $this->_removeButton('add');
    }
}

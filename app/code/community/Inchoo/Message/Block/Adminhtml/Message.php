<?php

class Inchoo_Message_Block_Adminhtml_Message extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct() 
    {
        $this->_blockGroup = 'inchoo_message';
        $this->_controller = 'adminhtml_message';
        $this->_headerText = Mage::helper('inchoo_message')->__('Submited messages');
        parent::__construct();
    }
}

<?php

class Inchoo_Message_Block_Adminhtml_Add extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        
        $this->_objectId = 'message_id';
         
        $this->_blockGroup = 'inchoo_message';
        $this->_controller = 'adminhtml';
        $this->_headerText = Mage::helper('inchoo_message')->__('New message');
        $this->_mode = 'add';
        parent::__construct();
        
        $this->_updateButton('save', 'label', Mage::helper('inchoo_message')->__('Save message'));
    }
}

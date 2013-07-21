<?php

class Inchoo_Message_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'message_id';
         
        $this->_blockGroup = 'inchoo_message';
        $this->_controller = 'adminhtml';
        $this->_headerText = Mage::helper('inchoo_message')->__('Edit message #%s', Mage::registry('inchoo_message')->getMessageId());
        $this->_mode = 'edit';
        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('inchoo_message')->__('Save message'));
    }
}
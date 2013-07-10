<?php

class Inchoo_Support_Block_Adminhtml_Customer_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'ticket_id';
         
        $this->_blockGroup = 'inchoo_support';
        $this->_controller = 'adminhtml_customer';
        $this->_headerText = Mage::helper('inchoo_support')->__('Edit Ticket #%s', Mage::registry('inchoo_support_ticket')->getId());
         
        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('inchoo_support')->__('Save Ticket'));
    }
}
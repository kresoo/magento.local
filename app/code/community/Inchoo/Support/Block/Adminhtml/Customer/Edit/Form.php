<?php

class Inchoo_Support_Block_Adminhtml_Customer_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('inchooSupportTicketForm');
    }
    
    protected function _prepareForm()
    {
        $ticket = Mage::registry('inchoo_support_ticket');
        $flagOptions = Mage::getModel('adminhtml/system_config_source_yesno')->toArray();
        
        $form = new Varien_Data_Form(
                array(
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save', array('ticket_id' => $this->getRequest()->getParam('id'))),
                    'method' => 'post'
                )
          );
        
        $fieldset = $form->addFieldset('edit_fieldset', array('legend' => Mage::helper('inchoo_support')->__('Ticket info')));
        
        $fieldset->addField('title', 'text', array(
            'label' => Mage::helper('inchoo_support')->__('Title'),
            'name' => 'title',
            'value' => $ticket->getTitle(),
            'readonly' => true
        ));
              
       $fieldset->addField('description', 'text', array(
            'label' => Mage::helper('inchoo_support')->__('Decription'),
            'name' => 'description',
           'value' => $ticket->getDescription(),
           'readonly' => true
        ));
        
        $fieldset->addField('created_at', 'text', array(
            'label' => Mage::helper('inchoo_support')->__('Created at'),
            'name' => 'created_at',
            'value' => $ticket->getCreated(),
            'readonly' => true
        ));
       
        $fieldset->addField('comment', 'textarea', array(
            'label' => Mage::helper('inchoo_support')->__('Comment'),
            'name' => 'comment',
            'value' => $ticket->getComment(),
            'required' => true,
        ));
        
        $fieldset->addField('flag', 'select', array(
            'label' => Mage::helper('inchoo_support')->__('Resolved'),
            'name' => 'resolved',
            'required' => true,
            'options' => $flagOptions
        ));
        
        
        $form->setUseContainer(true);
        $this->setForm($form);
        
        return parent::_prepareForm();
    }
}

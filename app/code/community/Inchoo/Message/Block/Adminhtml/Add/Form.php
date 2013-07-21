<?php

class Inchoo_Message_Block_Adminhtml_Add_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
       
        parent::__construct();
        $this->setId('inchooMessageAddForm');
    }
    
    protected function _prepareForm()
    {
        
        $form = new Varien_Data_Form(
                array(
                    'id' => 'add_form',
                    'action' => $this->getUrl('*/*/save'),
                    'method' => 'post'
                )
          );
        
        $fieldset = $form->addFieldset('add_fieldset', array('legend' => Mage::helper('inchoo_message')->__('New message')));
        
        $fieldset->addField('message_title', 'text', array(
            'label' => Mage::helper('inchoo_message')->__('Message title'),
            'name' => 'message_title',
            'required' => true
        ));
              
       $fieldset->addField('message_body', 'text', array(
            'label' => Mage::helper('inchoo_message')->__('Message body'),
            'name' => 'message_body',
           'required' => true
        ));

        
        $form->setUseContainer(true);
        $this->setForm($form);
        
        return parent::_prepareForm();
    }
}
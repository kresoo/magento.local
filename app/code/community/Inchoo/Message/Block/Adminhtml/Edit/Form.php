<?php

class Inchoo_Message_Block_Adminhtml_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
        
        parent::__construct();
        $this->setId('inchooMessageEditForm');
    }
    
    protected function _prepareForm()
    {
        $message = Mage::registry('inchoo_message');
        
        $form = new Varien_Data_Form(
                array(
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save', array('message_id' => $message->getMessageId())),
                    'method' => 'post'
                )
          );
        
        $fieldset = $form->addFieldset('edit_fieldset', array('legend' => Mage::helper('inchoo_message')->__('Message data')));
        
        $fieldset->addField('message_title', 'text', array(
            'label' => Mage::helper('inchoo_message')->__('Message title'),
            'name' => 'message_title',
            'value' => $message->getMessageTitle(),
        ));
              
       $fieldset->addField('message_body', 'text', array(
            'label' => Mage::helper('inchoo_message')->__('Message body'),
            'name' => 'message_body',
            'value' => $message->getMessageBody(),
        ));
        
        $form->setUseContainer(true);
        $this->setForm($form);
        
        return parent::_prepareForm();
    }
}
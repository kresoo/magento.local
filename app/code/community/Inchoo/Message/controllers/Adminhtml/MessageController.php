<?php

class Inchoo_Message_Adminhtml_MessageController extends Mage_Adminhtml_Controller_Action
{
    public function IndexAction()
    {
        $this->_title($this->__('Customers'))->_title($this->__('Submited messages'));
        $this->loadLayout();
        $this->_setActiveMenu('customer');
        $this->_addContent($this->getLayout()->createBlock('inchoo_message/adminhtml_message'));
        $this->renderLayout();
    }
    
    public function EditAction()
    {
        $message = Mage::getModel('inchoo_message/message')->load($this->getRequest()->getParam('id'));
        
        Mage::register('inchoo_message', $message);
        
        $this->_title($this->__('Submited messages'))->_title($this->__('Edit message #%s', $message->getMessageId()));
        $this->loadLayout();
        $this->_setActiveMenu('customer');
        $this->_addContent($this->getLayout()->createBlock('inchoo_message/adminhtml_edit'));
        $this->renderLayout();
    }
    
    public function NewAction()
    {
        $this->_title($this->__('Submited messages'))->_title($this->__('New message'));
        $this->loadLayout();
        $this->_setActiveMenu('customer');
        $this->_addContent($this->getLayout()->createBlock('inchoo_message/adminhtml_add'));
        $this->renderLayout();
    }
    
    public function SaveAction()
    {
        if($this->getRequest()->getParam('message_id')){
            $message = Mage::getModel('inchoo_message/message')->load($this->getRequest()->getParam('message_id'));
        } else {
            $message = Mage::getModel('inchoo_message/message');
        }
        
        
        try{
            $message->setMessageTitle($this->getRequest()->getParam('message_title'))
                    ->setMessageBody($this->getRequest()->getParam('message_body'))
                    ->save();
            
            Mage::getSingleton('core/session')->addSuccess('Message saved successfully');
        } catch (Exception $e) {
            Mage::getSingleton('core/session')->addError('There was an error');
        }
        
        $this->_redirect('*/*/');
    }
    
}

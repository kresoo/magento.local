<?php

class Inchoo_Support_Adminhtml_TicketController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Sales'))->_title($this->__('Support tickets'));
        $this->loadLayout();
        $this->_setActiveMenu('sales');
        $this->_addContent($this->getLayout()->createBlock('inchoo_support/adminhtml_customer_support'));
        $this->renderLayout();
    }
    
    public function editAction()
    {   
        $ticket = Mage::getModel('inchoo_support/ticket')->load($this->getRequest()->getParam('id'));
        
        Mage::register('inchoo_support_ticket', $ticket);
        
        $this->_title($this->__('Support Tickets'))->_title($this->__('Edit Ticket #%s', $ticket->getId()));
        $this->loadLayout();
        $this->_setActiveMenu('sales');
        $this->_addContent($this->getLayout()->createBlock('inchoo_support/adminhtml_customer_edit'));
        $this->renderLayout();
    }
    
    public function saveAction()
    {
        $request = $this->getRequest();
        $ticket = Mage::getModel('inchoo_support/ticket')->load($request->getParam('ticket_id'));
        
        try{
            $ticket->setComment($request->getParam('comment'));
            if($request->getParam('resolved') == 1){
                $ticket->setFlag(1)
                       ->setResolved(time())
                       ->save();
            } else {
                $ticket->setFlag(0)
                       ->setResolved()
                       ->save();
            }
            Mage::getSingleton('core/session')->addError('Ticket edited successfully');
        } catch (Exception $e){
            Mage::getSingleton('core/session')->addError('There was an error with ticket edit.');
        }
        
        return $this->_redirect('*/*/edit', array('id' => $request->getParam('ticket_id'))); 
    }
    
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('inchoo_support/adminhtml_customer_support_grid')->toHtml()
        );
    }
}

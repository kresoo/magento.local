<?php

class Inchoo_Support_TicketController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        if( !Mage::getSingleton('customer/session')->isLoggedIn() ) {
            Mage::getSingleton('customer/session')->authenticate($this);
            return;
        }
        
        $this->loadLayout();
        $this->renderLayout();
    }
    
    public function createAction()
    {
        $request = $this->getRequest();
        
        $userId = Mage::getSingleton('customer/session')->getCustomer()->getId();
        
        if($request->getParam('title', null) && $request->getParam('ticket_body', null)){
            try{
                $model = Mage::getModel('inchoo_support/ticket')
                        ->setData('user_id',$userId)
                        ->setData('title',$request->getParam('title'))
                        ->setData('description',$request->getParam('ticket_body'))
                        ->setData('flag',0)
                        ->setData('created', time())
                        ->save();
            }catch(Exception $e){
                Mage::getSingleton('core/session')->addError('Ticket could not be saved.');
            }
        } else {
            Mage::getSingleton('core/session')->addError('You must provide all fields');
            return $this->_redirect('inchoo_support/ticket/index');
        }
        
        return $this->_redirect('inchoo_support/ticket/index');
    }
    
    public function viewAction()
    {
        if( !Mage::getSingleton('customer/session')->isLoggedIn() ) {
            Mage::getSingleton('customer/session')->authenticate($this);
            return;
        }
        
        $this->loadLayout();
        $this->renderLayout();
    }
    
    
    
}
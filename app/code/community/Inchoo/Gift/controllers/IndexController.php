<?php

class Inchoo_Gift_IndexController extends Mage_Core_Controller_Front_Action
{
    
   public function preDispatch()
    {
        parent::preDispatch();
        if (!Mage::getSingleton('customer/session')->authenticate($this)) {
        $this->getResponse()->setRedirect(Mage::helper('customer')->getLoginUrl());
        $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }
    }
    
    public function IndexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    
    public function newPostAction()
    {
        try{
            $data = $this->getRequest()->getParams();
            $registry = Mage::getModel('inchoo_gift/giftentity');
            $customer = Mage::getSingleton('customer/session')->getCustomer();
            
            if($this->getRequest()->isPost && !empty($data)){
                $registry->updateRegistryData($customer, $data);
                $registry->save();
                
                Mage::getSingleton('core/session')->addError('Successfuly created');
            } else{
                throw new Exception('Insufficient data');
            }
        } catch (Mage_Core_Exception $e){
            Mage::getSingleton('core/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }
    
    public function editPostAction()
    {
        try{
            $data = $this->getRequest()->getParams();
            $registry = Mage::getModel('inchoo_gift/giftentity');
            $customer = Mage::getSingleton('customer/session')->getCustomer();
            
            if($this->getRequest()->isPost && !empty($data)){
                $registry->load($data['registry_id']);
                
                if($registry){
                $registry->updateRegistryData($customer, $data);
                $registry->save();
                
                Mage::getSingleton('core/session')->addSuccess('Successfuly created');
                }else{
                    throw new Exception('No registry loaded');
                }
            } else{
                throw new Exception('Insufficient data');
            }
        } catch (Mage_Core_Exception $e){
            Mage::getSingleton('core/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }
    
    public  function deleteAtion()
    {
        try{
           $reqistry_id = $this->getRequest()->getParam('registry_id');
           if($registry_id && $this->getRequest()->isPost){
               if($reqistry = Mage::getModel('inchoo_gift/giftentity')->load($registry_id)){
                   $registry->delete();
                   Mage::getSingleton('core/session')->addSuccess('Deleted');
               } else{
                   throw new Exception('Registry not loaded');
               }
           } else {
               throw new Exception('No registry id');
           }
        } catch (Mage_Core_Exception $e){
             Mage::getSingleton('core/session')->addError($e->getMessage());
             $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }
}










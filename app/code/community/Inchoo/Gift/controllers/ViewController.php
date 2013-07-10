<?php

class Inchoo_Gift_ViewController extends Mage_Core_Controller_Front_Action
{
    public function ViewAction()
    {
        $registry_id = $this->getRequest()->getParam('registry_id');
        
        if($registry_id){
             $entity = Mage::getModel('inchoo_git/giftentity');
             if($entity->load($registry_id)){
                 Mage::register('loaded_registry', $entity);
                 $this->loadLayout();
                 $this->_initLayoutMessages('customer_session');
                 $this->renderLayout();
                 return $this;
             } else {
                 $this->_forward('noroute');
                 return $this;
             }
        }
    }
}
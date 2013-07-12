<?php

class Inchoo_Image_ImageController extends Mage_Core_Controller_Front_Action
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
    
    public function newAction()
    {
        if( !Mage::getSingleton('customer/session')->isLoggedIn() ) {
            Mage::getSingleton('customer/session')->authenticate($this);
            return;
        }
        
        $this->loadLayout();
        $this->renderLayout();

    }
    
    public function saveimageAction()
    {
        
    }
}
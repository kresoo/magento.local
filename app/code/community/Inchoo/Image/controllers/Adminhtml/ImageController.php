<?php

class Inchoo_Image_Adminhtml_ImageController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Customers'))->_title($this->__('Uploaded images'));
        $this->loadLayout();
        $this->_setActiveMenu('customer');
        $this->_addContent($this->getLayout()->createBlock('inchoo_image/adminhtml_image'));
        $this->renderLayout();
    }
}

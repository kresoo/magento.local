<?php

class Inchoo_Exchange_Adminhtml_ExchangeController extends Mage_Adminhtml_Controller_Action
{

    public function IndexAction() 
    {
        $this->_title($this->__('Sales'))->_title($this->__('Exchange rates'));
        $this->loadLayout();
        $this->_setActiveMenu('sales');
        $this->_addContent($this->getLayout()->createBlock('inchoo_exchange/adminhtml_exchange'));
        $this->renderLayout();    
    }

    public function refreshExchangeRatesAction()
    {
        $allRates = Mage::helper('inchoo_exchange')->getExchangeRates();
        try{
            $read = Mage::getSingleton('core/resource')->getConnection('core_read');    
            $read->query("TRUNCATE TABLE inchoo_exchange_rate");
            
            foreach($allRates as $rate){
                Mage::getModel('inchoo_exchange/exchangerate')->addData($rate)->save();
            }
            
            Mage::getSingleton('core/session')->addSuccess("Exchange rates updated");
        } catch (Mage_Core_Exception $e){
            Mage::getSingleton('core/session')->addError($e->getMessage());
        }
        
        $this->_redirect('*/exchange/index');
   }
   
          public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('inchoo_exchange/adminhtml_exchange_grid')->toHtml()
        );
    }
}
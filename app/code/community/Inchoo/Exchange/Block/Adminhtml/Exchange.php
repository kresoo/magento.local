<?php

class Inchoo_Exchange_Block_Adminhtml_Exchange extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct() {
        $this->_blockGroup = 'inchoo_exchange';
        $this->_controller = 'adminhtml_exchange';
        $this->_headerText = Mage::helper('inchoo_exchange')->__('Exchange rates');
        $this->_removeButton('add');
        $this->_addButton('refresh', array(
            'label'     => Mage::helper('inchoo_exchange')->__('Update exchange rates'),
            'onclick'   => "setLocation('".$this->getUrl('*/exchange/refreshExchangeRates')."')",
            
        ));
        parent::__construct();
        
    }
}

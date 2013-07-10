<?php

class Inchoo_Exchange_Block_Adminhtml_Exchange_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct() 
    {
        parent::__construct();
        $this->setId('inchooExchangeRatesGrid');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
    
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('inchoo_exchange/exchangerate')->getCollection();
        $this->setCollection($collection);
        parent::_prepareCollection();

        return $this;
    }
    
    protected function _prepareColumns()
    {   
        
        $this->addColumn('država', array(
            'header'    => Mage::helper('inchoo_exchange')->__('Država'),
            'index'     => 'drzava'
        ));
        $this->addColumn('šifra', array(
            'header'    => Mage::helper('inchoo_exchange')->__('Šifra') ,
            'index'     => 'sifra'
        ));
        $this->addColumn('valuta', array(
            'header'    => Mage::helper('inchoo_exchange')->__('Valuta') ,
            'index'     => 'valuta'
        ));
        $this->addColumn('jedinica', array(
            'header'    => Mage::helper('inchoo_exchange')->__('Jedinica'),
            'index'     => 'jedinica',
        ));
        $this->addColumn('kupovni', array(
            'header'    => Mage::helper('inchoo_exchange')->__('Kupovni'),
            'index'     => 'kupovni',
        ));
        $this->addColumn('srednji', array(
            'header'    => Mage::helper('inchoo_exchange')->__('Srednji'),
            'index'     => 'srednji'
        ));
        $this->addColumn('prodajni', array(
            'header'    => Mage::helper('inchoo_exchange')->__('Prodajni'),
            'index'     => 'prodajni'
        ));

        return parent::_prepareColumns();
    }
    
      public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}


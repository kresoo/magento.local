<?php

class Inchoo_Image_Block_Adminhtml_Image_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct() 
    {
        parent::__construct();
        $this->setId('inchooUploadedIMagesGrid');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
    
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('inchoo_image/image')->getCollection();
        $collection->getSelect()->join(array('a'=>'customer_entity'),'a.entity_id=main_table.user_id',array('a.email'));
        $this->setCollection($collection);
        parent::_prepareCollection();

        return $this;
    }
    
    protected function _prepareColumns()
    {  
        
        $this->addColumn('image_id', array(
            'header'    => Mage::helper('inchoo_support')->__('ID'),
            'align'     =>'center',
            'width'     => '50px',
            'index'     => 'image_id'
        ));
        $this->addColumn('image_title', array(
            'header'    => Mage::helper('inchoo_support')->__('Image title') ,
            'align'     => 'center',
            'index'     => 'image_title'
        ));
        $this->addColumn('image', array(
            'header'    => Mage::helper('inchoo_support')->__('Image') ,
            'align'     => 'center',
            'index'     => 'image_name',
            'renderer'  => 'Inchoo_Image_Block_Adminhtml_ImageRenderer'
        ));
        $this->addColumn('created_by', array(
            'header'    => Mage::helper('inchoo_support')->__('Created by'),
            'align'     => 'center',
            'index'     => 'email',
        ));
 
        return parent::_prepareColumns();
    }
    
      public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }

}

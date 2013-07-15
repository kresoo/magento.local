<?php

class Inchoo_Image_Block_Adminhtml_Image extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct() 
    {
        $this->_blockGroup = 'inchoo_image';
        $this->_controller = 'adminhtml_image';
        $this->_headerText = Mage::helper('inchoo_image')->__('Uploaded images');
        parent::__construct();
        $this->_removeButton('add');
    }
}
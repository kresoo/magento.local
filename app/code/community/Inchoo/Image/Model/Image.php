<?php

class Inchoo_Image_Model_Image extends Mage_Core_Model_Abstract
{
    public $src;

    protected function _construct() 
    {
        $this->_init('inchoo_image/image');
    }
    
}
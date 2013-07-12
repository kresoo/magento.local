<?php

class Inchoo_Image_Model_Resource_Image extends Mage_Core_Model_Resource_Db_Abstract
{
     protected function _construct()
    {
        $this->_init('inchoo_image/inchooimage', 'image_id');
    }
}

<?php

class Inchoo_Image_Block_Adminhtml_ImageRenderer extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $html = '<img style="width:100px;height:100px;"';
        $html .= 'src="' . Mage::getBaseUrl('media') . DS . 'inchooimages' . DS . $row->getData($this->getColumn()->getIndex()) . '"';
        $html .= '"/>';
        return $html;
    }
}

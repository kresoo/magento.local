<?php

class Inchoo_Message_Block_Adminhtml_Message_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct() 
    {
        parent::__construct();
        $this->setId('inchooSubmitedMessagesGrid');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
    
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('inchoo_message/message')->getCollection();
        
        $this->setCollection($collection);
        parent::_prepareCollection();

        return $this;
    }
    
    protected function _prepareColumns()
    {  
        
        $this->addColumn('message_id', array(
            'header'    => Mage::helper('inchoo_message')->__('ID'),
            'align'     =>'center',
            'width'     => '50px',
            'index'     => 'message_id'
        ));
        $this->addColumn('message_title', array(
            'header'    => Mage::helper('inchoo_message')->__('Message title') ,
            'align'     => 'center',
            'index'     => 'message_title'
        ));
        $this->addColumn('message_body', array(
            'header'    => Mage::helper('inchoo_message')->__('Message body') ,
            'align'     => 'center',
            'index'     => 'message_body',
        ));
        $this->addColumn('action', 
            array(
                'header'    => Mage::helper('inchoo_support')->__('Edit'),
                'width'     => '130px',
                'type'      => 'action',
                'getter'    => 'getMessageId',
                'actions'   => array(
                    array(
                        'caption' => Mage::helper('inchoo_support')->__('Edit message'),
                        'url'     => array(
                            'base'=> '*/*/edit'
                        ),
                        'field'   => 'id'
                    )
                )
        ));
 
        return parent::_prepareColumns();
    }
    
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}
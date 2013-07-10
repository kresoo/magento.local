<?php

class Inchoo_Support_Block_Adminhtml_Customer_Support_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct() 
    {
        parent::__construct();
        $this->setId('inchooSupportTicketGrid');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
    
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('inchoo_support/ticket')->getCollection();
        $collection->getSelect()->join(array('a'=>'customer_entity'),'a.entity_id=main_table.user_id',array('a.email'));
        $this->setCollection($collection);
        parent::_prepareCollection();

        return $this;
    }
    
    protected function _prepareColumns()
    {   
        $flagOptions = Mage::getModel('adminhtml/system_config_source_yesno')->toArray();
        
        $this->addColumn('ticket_id', array(
            'header'    => Mage::helper('inchoo_support')->__('ID'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'ticket_id'
        ));
        $this->addColumn('title', array(
            'header'    => Mage::helper('inchoo_support')->__('Title') ,
            'index'     => 'title'
        ));
        $this->addColumn('description', array(
            'header'    => Mage::helper('inchoo_support')->__('Description') ,
            'index'     => 'description'
        ));
        $this->addColumn('flag', array(
            'header'    => Mage::helper('inchoo_support')->__('Resolved'),
            'width'     => '50px',
            'index'     => 'flag',
            'type'      => 'options',
            'options'   => $flagOptions
        ));
        $this->addColumn('created_by', array(
            'header'    => Mage::helper('inchoo_support')->__('Created by'),
            'width'     => '80px',
            'index'     => 'email',
        ));
        $this->addColumn('created_at', array(
            'header'    => Mage::helper('inchoo_support')->__('Created at'),
            'width'     => '80px',
            'type'      => 'datetime',
            'index'     => 'created'
        ));
        $this->addColumn('action', 
            array(
                'header'    => Mage::helper('inchoo_support')->__('Actions'),
                'width'     => '130px',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption' => Mage::helper('inchoo_support')->__('Edit Ticket'),
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

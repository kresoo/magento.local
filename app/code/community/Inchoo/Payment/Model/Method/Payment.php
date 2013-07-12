<?php

class Inchoo_Payment_Model_Method_Payment extends Mage_Payment_Model_Method_Abstract
{

    protected $_code  = 'inchoopayment';
    protected $_formBlockType = 'payment/form_checkmo';
    protected $_infoBlockType = 'payment/info_checkmo';
    protected $_canUseCheckout = true;

    /**
     * Assign data to info model instance
     *
     * @param   mixed $data
     * @return  Mage_Payment_Model_Method_Checkmo
     */
    public function assignData($data)
    {
        $details = array();
        if ($this->getPayableTo()) {
            $details['payable_to'] = $this->getPayableTo();
        }
        if ($this->getMailingAddress()) {
            $details['mailing_address'] = $this->getMailingAddress();
        }
        if (!empty($details)) {
            $this->getInfoInstance()->setAdditionalData(serialize($details));
        }
        return $this;
    }

    public function getPayableTo()
    {
        return $this->getConfigData('payable_to');
    }

    public function getMailingAddress()
    {
        return $this->getConfigData('mailing_address');
    }

}
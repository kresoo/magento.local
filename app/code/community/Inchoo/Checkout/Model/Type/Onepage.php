<?php

class Inchoo_Checkout_Model_Type_Onepage extends Mage_Checkout_Model_Type_Onepage
{
    public function saveComment($data){
		if (empty($data)) {
			return array('error' => -1, 'message' => $this->_helper->__('Invalid data.'));
		}
                
		$this->getQuote()->setComment($data['like']);
		$this->getQuote()->collectTotals();
		$this->getQuote()->save();
    
		$this->getCheckout()
                ->setStepData('comment', 'complete', true)
                ->setStepData('review', 'allow', true);
                

		return array();
	
	} 
        
     public function savePayment($data)
    {
        if (empty($data)) {
            return array('error' => -1, 'message' => Mage::helper('checkout')->__('Invalid data.'));
        }
        $quote = $this->getQuote();
        if ($quote->isVirtual()) {
            $quote->getBillingAddress()->setPaymentMethod(isset($data['method']) ? $data['method'] : null);
        } else {
            $quote->getShippingAddress()->setPaymentMethod(isset($data['method']) ? $data['method'] : null);
        }

        // shipping totals may be affected by payment method
        if (!$quote->isVirtual() && $quote->getShippingAddress()) {
            $quote->getShippingAddress()->setCollectShippingRates(true);
        }

        $payment = $quote->getPayment();
        $payment->importData($data);

        $quote->save();

        $this->getCheckout()
            ->setStepData('payment', 'complete', true)
            ->setStepData('comment', 'allow', true);

        return array();
    }
   
}

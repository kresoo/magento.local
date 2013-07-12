<?php

require_once 'Mage/Checkout/controllers/OnepageController.php';

class Inchoo_Checkout_OnepageController extends Mage_Checkout_OnepageController {

     public function savePaymentAction()
    {
        $this->_expireAjax();
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost('payment', array());
            /*
            * first to check payment information entered is correct or not
            */
<<<<<<< HEAD
            
=======

>>>>>>> 8c92ffa211c6f50723866237e28cde4989e3d55f
            try {
                $result = $this->getOnepage()->savePayment($data);
            }
            catch (Mage_Payment_Exception $e) {
                if ($e->getFields()) {
                    $result['fields'] = $e->getFields();
                }
                $result['error'] = $e->getMessage();
            }
            catch (Exception $e) {
                $result['error'] = $e->getMessage();
            }
            $redirectUrl = $this->getOnePage()->getQuote()->getPayment()->getCheckoutRedirectUrl();
            if (empty($result['error']) && !$redirectUrl) {
				$this->loadLayout('checkout_onepage_comment');

                $result['goto_section'] = 'comment';
            }

            if ($redirectUrl) {
                $result['redirect'] = $redirectUrl;
            }

            $this->getResponse()->setBody(Zend_Json::encode($result));
        }
    }
    
     
    
     public function saveCommentAction()
      {
        $this->_expireAjax();
        if ($this->getRequest()->isPost()) {
            
        	//Grab the submited value heared for us value
        	$data = $this->getRequest()->getPost('comment',array());
                Mage::getSingleton('core/session')->setComment($data);
                $result = $this->getOnepage()->saveComment($data);
                $redirectUrl = $this->getOnePage()->getQuote()->getPayment()->getCheckoutRedirectUrl();
            if (!$redirectUrl) {
                $this->loadLayout('checkout_onepage_review');

                $result['goto_section'] = 'review';
                $result['update_section'] = array(
                    'name' => 'review',
                    'html' => $this->_getReviewHtml()
                );

            }

            if ($redirectUrl) {
                $result['redirect'] = $redirectUrl;
            }

            $this->getResponse()->setBody(Zend_Json::encode($result));
        }
    }  
}
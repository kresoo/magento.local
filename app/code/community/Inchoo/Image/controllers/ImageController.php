<?php

class Inchoo_Image_ImageController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        if( !Mage::getSingleton('customer/session')->isLoggedIn() ) {
            Mage::getSingleton('customer/session')->authenticate($this);
            return;
        }
        
        $this->loadLayout();
        $this->renderLayout();
    }
    
    public function newAction()
    {
        if( !Mage::getSingleton('customer/session')->isLoggedIn() ) {
            Mage::getSingleton('customer/session')->authenticate($this);
            return;
        }
        
        $this->loadLayout();
        $this->renderLayout();
    }
    
    public function saveimageAction()
    {
        if(isset($_FILES['uploaded_image'])){
            try{
                $uploader = new Varien_File_Uploader('uploaded_image');
               
                $uploader->setAllowedExtensions(array('jpg','jpeg','git','png'))
                         ->setAllowRenameFiles(true)
                         ->setAllowCreateFolders(true);
                
                $user_email = Mage::getSingleton('customer/session')->getCustomer()->getEmail();
                $image_folder = Mage::getBaseDir('media') . DS . 'inchooimages' . DS .  $user_email;
                
                $uploader->save($image_folder);
                
            } catch(Exception $e){
                Mage::getSingleton('customer/session')->addError($this->__("Image could not be uploaded."));
                $this->_redirect($this->getUrl('inchoo_image/image/new'));
            }        
        } else {
                Mage::getSingleton('customer/session')->addError($this->__("No image uploaded."));
                $this->_redirect($this->getUrl('inchoo_image/image/new'));
        }

        
    }
}

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
    
    public function viewAction()
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
               
                $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'))
                         ->setAllowRenameFiles(true)
                         ->setAllowCreateFolders(true);
                
                $user_email = Mage::getSingleton('customer/session')->getCustomer()->getEmail();
                $image_folder = Mage::getBaseDir('media') . DS . 'inchooimages' . DS .  $user_email;
                
                $uploader->save($image_folder);
                
                $user_id = Mage::getSingleton('customer/session')->getCustomer()->getId();
                $image_name = $user_email . DS . $_FILES['uploaded_image']['name'];
                $image_title = $this->getRequest()->getParam('title');

                $image = Mage::getModel('inchoo_image/image')
                        ->setUserId($user_id)
                        ->setImageName($image_name)
                        ->setImageTitle($image_title);
                
                $image->save();
            } catch(Exception $e){
                Mage::getSingleton('core/session')->addError($this->__("Image could not be uploaded."));
                $this->_redirect('inchoo_image/image/new');
            }  
            Mage::getSingleton('core/session')->addSuccess($this->__("Image uploaded successfully."));
            $this->_redirect('inchoo_image/image/new');
        } else {
                Mage::getSingleton('core/session')->addError($this->__("No image uploaded."));
                $this->_redirect('inchoo_image/image/new');
        }
      
        
    }
}

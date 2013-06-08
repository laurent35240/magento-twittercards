<?php
/**
 * Jean Jean Inc.
 * 
 *
 * @category   Laurent
 * @package    Laurent_Twittercards
 * @author     Laurent Clouet <laurent35240@gmail.com>
 * @date       4/10/13
 * @copyright  Copyright (c) 2013 Jean Jean Inc. (http://laurent-clouet.fr/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */ 
class Laurent_Twittercards_Model_Observer 
{
    /**
     * Handle twitter image I/O for CMS page
     * It uploads new image to folder media/cms/page
     * It handles also deletion of old image
     *
     * Method called by event cms_page_prepare_save
     * @param Varien_Event_Observer $observer
     */
    public function uploadTwitterImage(Varien_Event_Observer $observer)
    {
        /** @var Mage_Cms_Model_Page $page */
        $page = $observer->getEvent()->getData('page');
        $twitterImageValue = $page->getData('twitter_image');
        $newTwitterImageValue = '';

        //Previous image value
        if(is_array($twitterImageValue) && $twitterImageValue['value']) {
            $newTwitterImageValue = $twitterImageValue['value'];
        }

        //Delete old image
        if(isset($twitterImageValue['delete']) && $twitterImageValue['delete']=='1'){
            if(!empty($newTwitterImageValue)){
                $path = Mage::getBaseDir('media') . DS;
                @unlink($path . $newTwitterImageValue);
                $newTwitterImageValue = '';
            }
        }

        //Upload new image
        if(isset($_FILES['twitter_image']['name']) && !empty($_FILES['twitter_image']['name'])) {
            try {
                $uploader = new Mage_Core_Model_File_Uploader('twitter_image');
                $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
                $uploader->setAllowRenameFiles(true);
                $uploader->setFilesDispersion(true);
                $path = Mage::getBaseDir('media') . DS . 'cms' . DS . 'page';

                $uploader->save($path, $_FILES['twitter_image']['name']);
                $newTwitterImageValue = 'cms' . DS . 'page' . $uploader->getUploadedFileName();

            }catch(Exception $e) {
                Mage::logException($e);
                $errorMessage = Mage::helper('twittercards')->__('Error while uploading twitter image: %s', $e->getMessage());
                Mage::getSingleton('adminhtml/session')->addError($errorMessage);
            }
        }

        $page->setData('twitter_image', $newTwitterImageValue);
    }
}

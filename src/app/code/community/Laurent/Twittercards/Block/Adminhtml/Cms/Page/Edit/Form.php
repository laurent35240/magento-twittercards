<?php
/**
 * Jean Jean Inc.
 * 
 *
 * @category   Laurent
 * @package    Laurent_Twittercards
 * @author     Laurent Clouet <laurent35240@gmail.com>
 * @date       4/28/13
 * @copyright  Copyright (c) 2013 Jean Jean Inc. (http://laurent-clouet.fr/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */ 
class Laurent_Twittercards_Block_Adminhtml_Cms_Page_Edit_Form extends Mage_Adminhtml_Block_Cms_Page_Edit_Form
{
    /**
     * Prepare form for editing a CMS page
     * Method overwritten in order to change enctype of form
     *
     * @return Laurent_Twittercards_Block_Adminhtml_Cms_Page_Edit_Form
     */
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(
            array(
                'id'        => 'edit_form',
                'action'    => $this->getData('action'),
                'method'    => 'post',
                'enctype'   => Zend_Form::ENCTYPE_MULTIPART,
            )
        );
        $form->setData('use_container', true);
        $this->setForm($form);
        return $this;
    }
}

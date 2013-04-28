<?php
/**
 * Jean Jean Inc.
 * 
 *
 * @category   Laurent
 * @package    Laurent_Twittercars
 * @author     Laurent Clouet <laurent35240@gmail.com>
 * @date       4/7/13
 * @copyright  Copyright (c) 2013 Jean Jean Inc. (http://laurent-clouet.fr/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */ 
class Laurent_Twittercards_Block_Adminhtml_Cms_Page_Edit_Tab_Twittercards
    extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{

    protected function _prepareForm()
    {
        $helper = Mage::helper('twittercards');
        /*
         * Checking if user have permissions to save information
         */
        if ($this->_isAllowedAction('save')) {
            $isElementDisabled = false;
        } else {
            $isElementDisabled = true;
        }

        $form = new Varien_Data_Form();

        $form->setData('html_id_prefix', 'page_');

        $model = Mage::registry('cms_page');

        $fieldset = $form->addFieldset(
            'twitter_fieldset',
            array('legend' => $helper->__('Twitter cards'), 'class' => 'fieldset-wide')
        );

        $fieldset->addField('twitter_title', 'text', array(
            'name' => 'twitter_title',
            'label' => $helper->__('Title'),
            'title' => $helper->__('Title'),
            'disabled'  => $isElementDisabled
        ));

        $fieldset->addField('twitter_description', 'textarea', array(
            'name' => 'twitter_description',
            'label' => $helper->__('Description'),
            'title' => $helper->__('Description'),
            'disabled'  => $isElementDisabled
        ));

        $fieldset->addField('twitter_image', 'image', array(
            'name' => 'twitter_image',
            'label' => $helper->__('Image'),
            'title' => $helper->__('Image'),
            'disabled'  => $isElementDisabled
        ));

        Mage::dispatchEvent('adminhtml_cms_page_edit_tab_twitter_prepare_form', array('form' => $form));

        $form->setValues($model->getData());

        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Return Tab label
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('twittercards')->__('Twitter cards');
    }

    /**
     * Return Tab title
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('twittercards')->__('Twitter cards');
    }

    /**
     * Can show tab in tabs
     *
     * @return boolean
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Tab is hidden
     *
     * @return boolean
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $action
     * @return bool
     */
    protected function _isAllowedAction($action)
    {
        return Mage::getSingleton('admin/session')->isAllowed('cms/page/' . $action);
    }
}

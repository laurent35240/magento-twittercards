<?php
/**
 * Jean Jean Inc.
 * 
 *
 * @category   Laurent
 * @package    ${Package}
 * @author     Laurent Clouet <laurent35240@gmail.com>
 * @date       4/7/13
 * @copyright  Copyright (c) 2013 Jean Jean Inc. (http://laurent-clouet.fr/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */ 
class Laurent_Twittercards_Block_Meta_Page extends Laurent_Twittercards_Block_Meta_Abstract
{

    /**
     * @return string
     */
    public function getCanonicalUrl()
    {
        return $this->getMethodValueIfPage('getPageTwitterUrl');
    }

    public function getPageTwitterUrl(Mage_Cms_Model_Page $cmsPage)
    {
        $pageHelper = Mage::helper('cms/page');
        return $pageHelper->getPageUrl($cmsPage->getId());
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        // TODO: Implement getTitle() method.
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        // TODO: Implement getDescription() method.
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        // TODO: Implement getImageUrl() method.
    }

    /**
     * Get value from method of this class applied to current cms page if it exists
     * @param $methodName
     * @return mixed
     */
    protected function getMethodValueIfPage($methodName)
    {
        $value = null;
        $currentCmsPage = Mage::getSingleton('cms/page');
        if ($currentCmsPage instanceof Mage_Cms_Model_Page) {
            $value = call_user_func(array($this, $methodName), $currentCmsPage);
        }
        return $value;
    }
}

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
     * Get cache key informative items
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        $cacheKeyInfo = parent::getCacheKeyInfo();
        $currentPage = Mage::getSingleton('cms/page');
        $cacheKeyInfo[] = $currentPage->getId();

        return $cacheKeyInfo;
    }

    /**
     * @return string
     */
    public function getCanonicalUrl()
    {
        return $this->getMethodValueIfPage('getPageTwitterUrl');
    }

    /**
     * @param Mage_Cms_Model_Page $cmsPage
     * @return string
     */
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
        return $this->getMethodValueIfPage('getPageTwitterTitle');
    }

    /**
     * @param Mage_Cms_Model_Page $cmsPage
     * @return string
     */
    public function getPageTwitterTitle(Mage_Cms_Model_Page $cmsPage)
    {
        $attributeCodes = array('twitter_title', 'title');
        $rawTwitterTitle = $this->getEntityDataWithFallback($cmsPage, $attributeCodes);
        return $this->escapeHtml($rawTwitterTitle);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getMethodValueIfPage('getPageTwitterDescription');
    }

    /**
     * @param Mage_Cms_Model_Page $cmsPage
     * @return string
     */
    public function getPageTwitterDescription(Mage_Cms_Model_Page $cmsPage)
    {
        $attributeCodes = array('twitter_description', 'meta_description', 'description');
        $rawDescription = $this->getEntityDataWithFallback($cmsPage, $attributeCodes);
        return $this->cleanDescriptionForTwitter($rawDescription);
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->getMethodValueIfPage('getPageTwitterImageUrl');
    }

    /**
     * @param Mage_Cms_Model_Page $cmsPage
     * @return string
     */
    public function getPageTwitterImageUrl(Mage_Cms_Model_Page $cmsPage)
    {
        $twitterImageUrl = '';
        if($cmsPage->getData('twitter_image') != '') {
            $twitterImageUrl = Mage::getBaseUrl('media') . $cmsPage->getData('twitter_image');
        }
        return $twitterImageUrl;
    }

    /**
     * Get value from method of this class applied to current cms page if it exists
     * @param $methodName
     * @return mixed
     */
    protected function getMethodValueIfPage($methodName)
    {
        $currentCmsPage = Mage::getSingleton('cms/page');
        return call_user_func(array($this, $methodName), $currentCmsPage);
    }
}

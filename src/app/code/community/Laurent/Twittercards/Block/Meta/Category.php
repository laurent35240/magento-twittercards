<?php
/**
 * Jean Jean Inc.
 * 
 *
 * @category   Laurent
 * @package    Laurent_Twittercards
 * @author     Laurent Clouet <laurent35240@gmail.com>
 * @date       3/24/13
 * @copyright  Copyright (c) 2012 Jean Jean Inc. (http://laurent-clouet.fr/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */ 
class Laurent_Twittercards_Block_Meta_Category extends Laurent_Twittercards_Block_Meta_Abstract
{

    /**
     * Get cache key informative items
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        $cacheKeyInfo = parent::getCacheKeyInfo();
        $currentCategory = Mage::registry('current_category');
        if($currentCategory instanceof Mage_Catalog_Model_Category) {
            $cacheKeyInfo[] = $currentCategory->getId();
        }

        return $cacheKeyInfo;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getMethodValueIfCategory('getCatalogObjectTwitterTitle');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getMethodValueIfCategory('getCategoryTwitterDescription');
    }

    /**
     * @param Mage_Catalog_Model_Category $category
     * @return string
     */
    public function getCategoryTwitterDescription(Mage_Catalog_Model_Category $category)
    {
        $attributeCodes = array('twitter_description', 'meta_description', 'description');
        $rawDescription = $this->getEntityDataWithFallback($category, $attributeCodes);

        return $this->cleanDescriptionForTwitter($rawDescription);
    }


    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->getMethodValueIfCategory('getCategoryTwitterImageUrl');
    }

    /**
     * @param Mage_Catalog_Model_Category $category
     * @return string
     */
    public function getCategoryTwitterImageUrl(Mage_Catalog_Model_Category $category)
    {
        if ($category->getData('twitter_image') != '') {
            $imageUrl = Mage::getBaseUrl('media').'catalog/category/' . $category->getData('twitter_image');
        }
        else {
            $imageUrl = $category->getImageUrl();
        }
        return $imageUrl;
    }

    /**
     * Get value from method of this class applied to current category if it exists
     * @param $methodName
     * @return mixed
     */
    protected function getMethodValueIfCategory($methodName)
    {
        return $this->getMethodValueIfCorrectRegistry($methodName, 'current_category', 'Mage_Catalog_Model_Category');
    }
}

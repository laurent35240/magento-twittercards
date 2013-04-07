<?php
/**
 * Jean Jean Inc.
 * 
 *
 * @category   Laurent
 * @package    ${Package}
 * @author     Laurent Clouet <laurent35240@gmail.com>
 * @date       3/17/13
 * @copyright  Copyright (c) 2012 Jean Jean Inc. (http://laurent-clouet.fr/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */ 
class Laurent_Twittercards_Block_Meta_Product extends Laurent_Twittercards_Block_Meta_Abstract
{

    /**
     * @return string
     */
    public function getCanonicalUrl()
    {
        return $this->getMethodValueIfProduct('getProductTwitterUrl');
    }

    /**
     * @param Mage_Catalog_Model_Product $product
     * @return string
     */
    public function getProductTwitterUrl(Mage_Catalog_Model_Product $product)
    {
        return $product->getProductUrl();
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getMethodValueIfProduct('getCatalogObjectTwitterTitle');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getMethodValueIfProduct('getProductTwitterDescription');
    }

    /**
     * @param Mage_Catalog_Model_Product $product
     * @return string
     */
    public function getProductTwitterDescription(Mage_Catalog_Model_Product $product)
    {
        $attributeCodes = array('twitter_description', 'meta_description', 'short_description');
        $rawDescription = $this->getEntityDataWithFallback($product, $attributeCodes);

        return $this->cleanDescriptionForTwitter($rawDescription);
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->getMethodValueIfProduct('getProductTwitterImageUrl');
    }

    /**
     * @param Mage_Catalog_Model_Product $product
     * @return string
     */
    public function getProductTwitterImageUrl(Mage_Catalog_Model_Product $product)
    {
        /** @var $imageHelper Mage_Catalog_Helper_Image */
        $imageHelper = $this->helper('catalog/image');
        $imageAttributeCode = $this->getProductImageAttributeCodeToUse($product);
        $imageUrl = $imageHelper->init($product, $imageAttributeCode)->resize(120)->__toString();
        return $imageUrl;
    }

    /**
     * @param Mage_Catalog_Model_Product $product
     * @return string
     */
    public function getProductImageAttributeCodeToUse(Mage_Catalog_Model_Product $product)
    {
        $imageAttributeCode = 'image';
        if ($product->getData('twitter_image') != '') {
            $imageAttributeCode = 'twitter_image';
        }

        return $imageAttributeCode;
    }

    /**
     * Get value from method of this class applied to current product if it exists
     * @param $methodName
     * @return mixed
     */
    protected function getMethodValueIfProduct($methodName)
    {
        return $this->getMethodValueIfCorrectRegistry($methodName, 'current_product', 'Mage_Catalog_Model_Product');
    }
}

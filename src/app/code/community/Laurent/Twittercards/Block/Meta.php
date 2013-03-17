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
class Laurent_Twittercards_Block_Meta extends Mage_Core_Block_Template {

    /**
     * @return string
     */
    public function getCanonicalUrl()
    {
        $canonicalUrl = '';
        $currentProduct = Mage::registry('current_product');
        if($currentProduct instanceof Mage_Catalog_Model_Product) {
            $canonicalUrl = $currentProduct->getProductUrl();
        }
        return $canonicalUrl;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        $title = '';
        $currentProduct = Mage::registry('current_product');
        if($currentProduct instanceof Mage_Catalog_Model_Product) {
            $title = $this->getProductTwitterTitle($currentProduct);
        }
        return $title;
    }

    public function getProductTwitterTitle(Mage_Catalog_Model_Product $product)
    {
        return $this->escapeHtml($product->getName());
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        $description = '';
        $currentProduct = Mage::registry('current_product');
        if($currentProduct instanceof Mage_Catalog_Model_Product) {
            $description = $this->getProductTwitterDescription($currentProduct);
        }
        return $description;
    }

    /**
     * @param Mage_Catalog_Model_Product $product
     * @return string
     */
    public function getProductTwitterDescription(Mage_Catalog_Model_Product $product)
    {
        /** @var $coreHelper Mage_Core_Helper_Data */
        $coreHelper = $this->helper('core');
        /** @var $stringHelper Mage_Core_Helper_String */
        $stringHelper = $this->helper('core/string');
        $rawDescription = $product->getData('short_description');
        $description = $coreHelper->stripTags($rawDescription);
        $description = $stringHelper->truncate($description, 200);
        return $description;
    }

}

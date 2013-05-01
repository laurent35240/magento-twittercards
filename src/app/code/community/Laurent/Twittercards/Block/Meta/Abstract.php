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
abstract class Laurent_Twittercards_Block_Meta_Abstract extends Mage_Core_Block_Template
{

    /**
     * @return string
     */
    abstract public function getCanonicalUrl();

    /**
     * @return string
     */
    abstract public function getTitle();

    /**
     * @return string
     */
    abstract public function getDescription();

    /**
     * @return string
     */
    abstract public function getImageUrl();

    /**
     * Lifetime of cache is defined to one day
     * @return int
     */
    public function getCacheLifetime()
    {
        return 86400;
    }

    /**
     * @return string
     */
    public function getSiteTwitterName()
    {
        return Mage::getStoreConfig('twittercards/settings/site_account');
    }

    /**
     * @return string
     */
    public function getCreatorTwitterName()
    {
        return Mage::getStoreConfig('twittercards/settings/creator_account');
    }


    /**
     * @param Mage_Catalog_Model_Abstract $catalogObject
     * @return string
     */
    public function getCatalogObjectTwitterTitle(Mage_Catalog_Model_Abstract $catalogObject)
    {
        $attributeCodes = array('twitter_title', 'meta_title', 'name');
        $rawTwitterTitle = $this->getEntityDataWithFallback($catalogObject, $attributeCodes);
        return $this->escapeHtml($rawTwitterTitle);
    }

    /**
     * Get data from a Magento Object from first attribute that have a value
     * @param Varien_Object $entity
     * @param $attributeCodes
     * @return mixed
     */
    protected function getEntityDataWithFallback(Varien_Object $entity, $attributeCodes)
    {
        $data = null;
        reset($attributeCodes);
        $attributeCode = current($attributeCodes);
        while (!$data && $attributeCode !== false) {
            $data = $entity->getData($attributeCode);
            $attributeCode = next($attributeCodes);
        }
        ;
        return $data;
    }

    /**
     * Remove html tags and truncate description to 200 characters
     * @param string $rawDescription
     * @return string
     */
    public function cleanDescriptionForTwitter($rawDescription)
    {
        /** @var $coreHelper Mage_Core_Helper_Data */
        $coreHelper = $this->helper('core');
        /** @var $stringHelper Mage_Core_Helper_String */
        $stringHelper = $this->helper('core/string');

        $description = $coreHelper->stripTags($rawDescription);
        $description = $stringHelper->truncate($description, 200);
        return $description;
    }


    /**
     * Get value from a method of this class with registry object as first parameter
     *
     * @param string $methodName
     * @param string $registryKey
     * @param string $expectedClassName
     * @return mixed
     */
    protected function getMethodValueIfCorrectRegistry($methodName, $registryKey, $expectedClassName)
    {
        $value = null;
        $registryObject = Mage::registry($registryKey);
        if ($registryObject instanceof $expectedClassName) {
            $value = call_user_func(array($this, $methodName), $registryObject);
        }
        return $value;
    }
}

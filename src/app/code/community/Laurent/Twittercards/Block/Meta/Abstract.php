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


    protected function getMethodValueIfCorrectRegistry($methodName, $registryKey, $expectedClassName)
    {
        $value = null;
        $registryObject = Mage::registry($registryKey);
        if($registryObject instanceof $expectedClassName) {
            $value = call_user_func(array($this, $methodName), $registryObject);
        }
        return $value;
    }
}

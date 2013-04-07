<?php
/**
 * Jean Jean Inc.
 * 
 *
 * @category   Laurent
 * @package    Laurent_Twittercards
 * @author     Laurent Clouet <laurent35240@gmail.com>
 * @date       3/23/13
 * @copyright  Copyright (c) 2012 Jean Jean Inc. (http://laurent-clouet.fr/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */
/** @var $this Mage_Catalog_Model_Resource_Setup */
$this->startSetup();

/** @var $productEntityType Mage_Eav_Model_Entity_Type */
$productEntityType = Mage::getModel('eav/entity_type');
$productEntityType->loadByCode(Mage_Catalog_Model_Product::ENTITY);

//Adding Twitter cards group to all attribute set
/** @var $attributeSets Mage_Eav_Model_Resource_Entity_Attribute_Set_Collection */
$attributeSets = Mage::getResourceModel('eav/entity_attribute_set_collection');
$attributeSets->setEntityTypeFilter($productEntityType->getId());

foreach ($attributeSets as $attributeSet) {
    /** @var $attributeSet Mage_Eav_Model_Entity_Attribute_Set */
    $this->addAttributeGroup(Mage_Catalog_Model_Product::ENTITY, $attributeSet->getId(), 'Twitter Cards', 3);
}

//Creation of twitter title attribute
$this->addAttribute(
    $productEntityType->getId(),
    'twitter_title',
    array(
        'group' => 'Twitter Cards',
        'sort_order' => 10,
        'type' => 'varchar',
        'label' => 'Twitter Title',
        'input' => 'text',
        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
        'visible' => true,
        'required' => false,
        'user_defined' => true,
        'visible_on_front' => true,
        'unique' => false,
        'is_configurable' => false,
        'used_for_promo_rules' => false,
        'note'  => 'If not set, product meta title or name will be used'
    )
);

$this->endSetup();

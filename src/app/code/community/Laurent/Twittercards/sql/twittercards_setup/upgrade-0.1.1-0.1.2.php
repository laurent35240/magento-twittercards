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
/** @var $this Mage_Catalog_Model_Resource_Setup */
//Creation of category attributes
$this->startSetup();

/** @var $attributeSet Mage_Eav_Model_Entity_Attribute_Set */
$this->addAttributeGroup(Mage_Catalog_Model_Category::ENTITY, 'Default', 'Twitter Cards', 40);

//Creation of twitter title attribute
$this->addAttribute(
    Mage_Catalog_Model_Category::ENTITY,
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
        'note'  => 'If not set, category meta title or name will be used'
    )
);

//Creation of twitter description attribute
$this->addAttribute(
    Mage_Catalog_Model_Category::ENTITY,
    'twitter_description',
    array(
        'group' => 'Twitter Cards',
        'sort_order' => 20,
        'type' => 'text',
        'label' => 'Twitter Description',
        'input' => 'textarea',
        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
        'visible' => true,
        'required' => false,
        'user_defined' => true,
        'visible_on_front' => true,
        'unique' => false,
        'note'  => 'If not set, category meta description or description will be used'
    )
);

//Creation of twitter image attribute
$this->addAttribute(
    Mage_Catalog_Model_Category::ENTITY,
    'twitter_image',
    array(
        'group' => 'Twitter Cards',
        'sort_order' => 20,
        'type' => 'varchar',
        'label' => 'Twitter Image',
        'input' => 'image',
        'backend' => 'catalog/category_attribute_backend_image',
        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
        'visible' => true,
        'required' => false,
        'user_defined' => true,
        'visible_on_front' => true,
        'unique' => false,
        'note'  => 'If not set, category thumbnail image will be used'
    )
);

$this->endSetup();

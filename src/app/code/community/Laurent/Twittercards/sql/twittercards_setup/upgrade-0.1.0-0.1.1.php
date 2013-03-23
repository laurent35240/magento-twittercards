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

//Creation of twitter description attribute
$this->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'twitter_description', array(
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
    'is_configurable' => false,
    'used_for_promo_rules' => false,
    'note'  => 'If not set, product meta description or short description will be used'
));

//Creation of twitter image attribute
$this->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'twitter_image', array(
    'group' => 'Twitter Cards',
    'sort_order' => 20,
    'type' => 'varchar',
    'label' => 'Twitter Image',
    'input' => 'image',
    'backend' => 'twittercards/product_attribute_backend_image',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'visible_on_front' => true,
    'unique' => false,
    'is_configurable' => false,
    'used_for_promo_rules' => false,
    'note'  => 'If not set, product default image will be used'
));

$this->endSetup();

<?php
/**
 * Jean Jean Inc.
 * 
 *
 * @category   Laurent
 * @package    Laurent_Twittercards
 * @author     Laurent Clouet <laurent35240@gmail.com>
 * @date       4/7/13
 * @copyright  Copyright (c) 2013 Jean Jean Inc. (http://laurent-clouet.fr/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */
/** @var $this Mage_Catalog_Model_Resource_Setup */
//Creation of cms page attributes
$this->startSetup();

/** @var $attributeSet Mage_Eav_Model_Entity_Attribute_Set */
$this->addAttributeGroup(Mage_Catalog_Model_Category::ENTITY, 'Default', 'Twitter Cards', 40);

//Creation of twitter title attribute
$this->getConnection()->addColumn(
    $this->getTable('cms/page'),
    'twitter_title',
    array(
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'length'    => 70,
        'nullable'  => true,
        'comment'   => 'Twitter title of cms page',
    )
);

//Creation of twitter description attribute
$this->getConnection()->addColumn(
    $this->getTable('cms/page'),
    'twitter_description',
    array(
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'nullable'  => true,
        'comment'   => 'Twitter description of cms page',
    )
);

//Creation of twitter image attribute
$this->getConnection()->addColumn(
    $this->getTable('cms/page'),
    'twitter_image',
    array(
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'length'    => 255,
        'nullable'  => true,
        'comment'   => 'Twitter image of cms page',
    )
);

$this->endSetup();

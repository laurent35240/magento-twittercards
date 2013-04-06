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
class Laurent_Twittercards_Test_Block_Meta_Category extends EcomDev_PHPUnit_Test_Case
{

    /**
     * @loadFixture
     */
    public function testCategoryTwitterTitle()
    {
        /** @var $category Mage_Catalog_Model_Category */
        $category = Mage::getModel('catalog/category')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Category();
        $this->assertEquals('Category name', $metaBlock->getCatalogObjectTwitterTitle($category));
    }

    /**
     * @loadFixture
     */
    public function testCategoryTwitterTitleMetaTitleUsed()
    {
        /** @var $category Mage_Catalog_Model_Category */
        $category = Mage::getModel('catalog/category')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Category();
        $this->assertEquals('Category meta title', $metaBlock->getCatalogObjectTwitterTitle($category));
    }

    /**
     * @loadFixture
     */
    public function testCategoryTwitterTitleTwitterTitleUsed()
    {
        /** @var $category Mage_Catalog_Model_Category */
        $category = Mage::getModel('catalog/category')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Category();
        $this->assertEquals('Category twitter title', $metaBlock->getCatalogObjectTwitterTitle($category));
    }

    /**
     * @loadFixture
     */
    public function testCategoryTwitterDescription()
    {
        $category = Mage::getModel('catalog/category');
        $category->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Category();
        $this->assertEquals('Category description', $metaBlock->getCategoryTwitterDescription($category));
    }

    /**
     * @loadFixture
     */
    public function testCategoryTwitterDescriptionMetaUsed()
    {
        $category = Mage::getModel('catalog/category');
        $category->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Category();
        $this->assertEquals('Category meta description', $metaBlock->getCategoryTwitterDescription($category));
    }

    /**
     * @loadFixture
     */
    public function testCategoryTwitterDescriptionTwitterUsed()
    {
        $category = Mage::getModel('catalog/category');
        $category->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Category();
        $this->assertEquals('Category twitter description', $metaBlock->getCategoryTwitterDescription($category));
    }

    /**
     * @loadFixture
     */
    public function testCategoryTwitterDescriptionWithHtml()
    {
        $category = Mage::getModel('catalog/category');
        $category->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Category();
        $this->assertEquals('Category description', $metaBlock->getCategoryTwitterDescription($category));
    }
}

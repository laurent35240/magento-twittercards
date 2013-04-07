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
class Laurent_Twittercards_Test_Block_Meta_Product extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @loadFixture
     */
    public function testProductTwitterDescription()
    {
        /** @var $product Mage_Catalog_Model_Product */
        $product = Mage::getModel('catalog/product')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Product();
        $this->assertEquals('A short description', $metaBlock->getProductTwitterDescription($product));
    }

    /**
     * @loadFixture
     */
    public function testProductTwitterDescriptionMetaUsed()
    {
        /** @var $product Mage_Catalog_Model_Product */
        $product = Mage::getModel('catalog/product')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Product();
        $this->assertEquals('Meta description', $metaBlock->getProductTwitterDescription($product));
    }

    /**
     * @loadFixture
     */
    public function testProductTwitterDescriptionNewAttributeUsed()
    {
        /** @var $product Mage_Catalog_Model_Product */
        $product = Mage::getModel('catalog/product')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Product();
        $this->assertEquals('Twitter description', $metaBlock->getProductTwitterDescription($product));
    }

    /**
     * @loadFixture
     */
    public function testProductTwitterDescriptionWithHtml()
    {
        /** @var $product Mage_Catalog_Model_Product */
        $product = Mage::getModel('catalog/product')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Product();
        $this->assertEquals('A short description', $metaBlock->getProductTwitterDescription($product));
    }

    /**
     * @loadFixture
     */
    public function testProductTwitterDescriptionTooLong()
    {
        /** @var $product Mage_Catalog_Model_Product */
        $product = Mage::getModel('catalog/product')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Product();
        $twitterDescription = $metaBlock->getProductTwitterDescription($product);
        $this->assertLessThanOrEqual(200, strlen($twitterDescription));
    }

    /**
     * @loadFixture
     */
    public function testProductTwitterTitle()
    {
        /** @var $product Mage_Catalog_Model_Product */
        $product = Mage::getModel('catalog/product')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Product();
        $this->assertEquals('Product name', $metaBlock->getCatalogObjectTwitterTitle($product));
    }

    /**
     * @loadFixture
     */
    public function testProductTwitterTitleWithDoubleQuote()
    {
        /** @var $product Mage_Catalog_Model_Product */
        $product = Mage::getModel('catalog/product')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Product();
        $this->assertEquals('Product &quot;name&quot;', $metaBlock->getCatalogObjectTwitterTitle($product));
    }

    /**
     * @loadFixture
     */
    public function testProductTwitterTitleMetaUsed()
    {
        /** @var $product Mage_Catalog_Model_Product */
        $product = Mage::getModel('catalog/product')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Product();
        $this->assertEquals('Product meta title', $metaBlock->getCatalogObjectTwitterTitle($product));
    }

    /**
     * @loadFixture
     */
    public function testProductTwitterTitleNewAttributeUsed()
    {
        /** @var $product Mage_Catalog_Model_Product */
        $product = Mage::getModel('catalog/product')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Product();
        $this->assertEquals('Product twitter title', $metaBlock->getCatalogObjectTwitterTitle($product));
    }

    /**
     * @loadFixture
     */
    public function testProductImageAttributeCodeDefault()
    {
        /** @var $product Mage_Catalog_Model_Product */
        $product = Mage::getModel('catalog/product')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Product();
        $this->assertEquals('image', $metaBlock->getProductImageAttributeCodeToUse($product));
    }

    /**
     * @loadFixture
     */
    public function testProductImageAttributeCodeTwitter()
    {
        /** @var $product Mage_Catalog_Model_Product */
        $product = Mage::getModel('catalog/product')->load(1);
        $metaBlock = new Laurent_Twittercards_Block_Meta_Product();
        $this->assertEquals('twitter_image', $metaBlock->getProductImageAttributeCodeToUse($product));
    }
}

<?php
/**
 * Jean Jean Inc.
 * 
 *
 * @category   Laurent
 * @package    Laurent_Twittercards
 * @author     Laurent Clouet <laurent35240@gmail.com>
 * @date       4/28/13
 * @copyright  Copyright (c) 2013 Jean Jean Inc. (http://laurent-clouet.fr/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */ 
class Laurent_Twittercards_Test_Block_Meta_Page extends EcomDev_PHPUnit_Test_Case
{
    public function testPageTwitterTitle()
    {
        $page = Mage::getModel('cms/page');
        $page->setData(array(
            'title' => 'Page title',
        ));
        $metaBlock = new Laurent_Twittercards_Block_Meta_Page();
        $this->assertEquals('Page title', $metaBlock->getPageTwitterTitle($page));
    }

    public function testPageTwitterTitleNewAttributeUsed()
    {
        $page = Mage::getModel('cms/page');
        $page->setData(array(
            'title' => 'Page title',
            'twitter_title' => 'Twitter title'
        ));
        $metaBlock = new Laurent_Twittercards_Block_Meta_Page();
        $this->assertEquals('Twitter title', $metaBlock->getPageTwitterTitle($page));
    }

    public function testPageTwitterDescription()
    {
        $page = Mage::getModel('cms/page');
        $page->setData(array(
            'description' => 'Page description',
        ));
        $metaBlock = new Laurent_Twittercards_Block_Meta_Page();
        $this->assertEquals('Page description', $metaBlock->getPageTwitterDescription($page));
    }

    public function testPageTwitterDescriptionMetaUsed()
    {
        $page = Mage::getModel('cms/page');
        $page->setData(array(
            'description' => 'Page description',
            'meta_description'  => 'Page meta description',
        ));
        $metaBlock = new Laurent_Twittercards_Block_Meta_Page();
        $this->assertEquals('Page meta description', $metaBlock->getPageTwitterDescription($page));
    }

    public function testPageTwitterDescriptionNewAttributeUsed()
    {
        $page = Mage::getModel('cms/page');
        $page->setData(array(
            'description' => 'Page description',
            'meta_description'  => 'Page meta description',
            'twitter_description'   => 'Page twitter description',
        ));
        $metaBlock = new Laurent_Twittercards_Block_Meta_Page();
        $this->assertEquals('Page twitter description', $metaBlock->getPageTwitterDescription($page));
    }

    public function testPageTwitterImageUrl()
    {
        $page = Mage::getModel('cms/page');
        $page->setData(array(
            'twitter_image' => 'twitter_image.jpg',
        ));
        $metaBlock = new Laurent_Twittercards_Block_Meta_Page();
        $this->assertContains('twitter_image.jpg', $metaBlock->getPageTwitterImageUrl($page));
    }
}

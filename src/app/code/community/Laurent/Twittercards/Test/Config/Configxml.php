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
class Laurent_Twittercards_Test_Config_Configxml extends EcomDev_PHPUnit_Test_Case_Config {


    public function testMetaBlockAlias()
    {
        $this->assertBlockAlias('twittercards/meta', 'Laurent_Twittercards_Block_Meta');
    }

    public function testBackendImageModelAlias()
    {
        $this->assertModelAlias('twittercards/product_attribute_backend_image', 'Laurent_Twittercards_Model_Product_Attribute_Backend_Image');
    }

}

<?php
/**
 * @category    MT
 * @package     MT_CatalogSlideshow
 * @copyright   Copyright (C) 2008-2014 MagentoThemes.net. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      MagentoThemes.net
 * @email       support@magentothemes.net
 */

class MT_CatalogSlideshow_Helper_Data extends Mage_Core_Helper_Abstract{
    /**
     * @param $category Mage_Catalog_Model_Category
     * @return string
     */
    public function slideShow($category){
        if (!$category){
            $category = Mage::registry('current_category');
        }

        if (!$category || !$category->getId()) return '';

        $block = Mage::getSingleton('core/layout')->createBlock('mtcatalogslideshow/widget')
            ->setData('category', $category);

        return $block->toHtml();
    }
}

<?php
/**
 * @category    MT
 * @package     MT_CatalogSlideshow
 * @copyright   Copyright (C) 2008-2014 MagentoThemes.net. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      MagentoThemes.net
 * @email       support@magentothemes.net
 */

class MT_CatalogSlideshow_Block_Adminhtml_Catalog_Category_Helper_Images extends Varien_Data_Form_Element_Abstract{
    public function toHtml(){
        return Mage::getSingleton('core/layout')
            ->createBlock('mtcatalogslideshow/adminhtml_widget_form_element_images')
            ->setData('category', Mage::registry('current_category'))
            ->render($this);
    }
}

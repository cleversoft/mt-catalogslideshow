<?php
/**
 * @category    MT
 * @package     MT_CatalogSlideshow
 * @copyright   Copyright (C) 2008-2014 MagentoThemes.net. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      MagentoThemes.net
 * @email       support@magentothemes.net
 */

class MT_CatalogSlideshow_Model_Observer{
    public function adminhtmlCatalogCategoryTabs($observer){
        /* @var $tabs Mage_Adminhtml_Block_Catalog_Category_Tabs */
        $tabs = $observer->getEvent()->getTabs();
        $tabs->addTab('mt_catalogslideshow', array(
            'label'     => Mage::helper('mtcatalogslideshow')->__('Slide Show Settings'),
            'content'   => $tabs->getLayout()->createBlock('mtcatalogslideshow/adminhtml_catalog_category_tab_slider')->toHtml()
        ));
    }

    public function catalogCategoryPrepareSave($observer){
        $category   = $observer->getEvent()->getCategory();
        /* @var $category Mage_Catalog_Model_Category */
        $request    = $observer->getEvent()->getRequest();
        /* @var $request Mage_Core_Controller_Request_Http */
        $helper     = Mage::helper('core');
        /* @var $helper Mage_Core_Helper_Data */

        $enable     = $request->getParam('mt_catalogslideshow_enable');
        $images     = $request->getParam('mt_catalogslideshow_images');
        $transition = $request->getParam('mt_catalogslideshow_transition');
        $autoplay   = $request->getParam('mt_catalogslideshow_autoplay');
        $paging     = $request->getParam('mt_catalogslideshow_paging');
        $links      = $request->getParam('mt_catalogslideshow_links');
        $links_target = $request->getParam('mt_catalogslideshow_links_target');
        $data       = array();

        if (is_array($images)){
            foreach ($images as $i => $image){
                if (!$image) continue;
                $data[] = array(
                    'uri'   => $image,
                    'link'  => isset($links[$i]) && $links[$i] ? $links[$i] : null,
                    'target'=> isset($links_target[$i]) ? $links_target[$i] : null
                );
            }
        }

        $category->setData('mt_catalogslideshow_enable', $enable);
        $category->setData('mt_catalogslideshow_data', $helper->jsonEncode($data));
        $category->setData('mt_catalogslideshow_transition', $transition);
        $category->setData('mt_catalogslideshow_autoplay', $autoplay);
        $category->setData('mt_catalogslideshow_paging', $paging);

        Mage::app()->cleanCache(array(MT_CatalogSlideshow_Block_Widget::CACHE_TAG));
    }
}

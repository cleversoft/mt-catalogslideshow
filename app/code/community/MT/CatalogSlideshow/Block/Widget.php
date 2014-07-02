<?php
/**
 * @category    MT
 * @package     MT_CatalogSlideshow
 * @copyright   Copyright (C) 2008-2014 MagentoThemes.net. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      MagentoThemes.net
 * @email       support@magentothemes.net
 */

class MT_CatalogSlideshow_Block_Widget extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface{
    const CACHE_TAG = 'mt_catalogslideshow';

    protected function _construct(){
        parent::_construct();
        $this->setTemplate('mt/catalogslideshow/widget.phtml');
        $this->setData('cache_lifetime', 86400 * 7);
        $this->setData('cache_tags', array(self::CACHE_GROUP, self::CACHE_TAG));
    }

    protected function _getCategory(){
        $category = $this->getData('category');
        if (!$category){
            $category = Mage::registry('current_category');
        }

        return $category;
    }

    public function getCacheKeyInfo(){
        return array(
            self::CACHE_TAG,
            Mage::app()->getStore()->getId(),
            $this->_getCategory()->getId()
        );
    }

    public function getHtmlId(){
        /* @var $helper Mage_Core_Helper_Data */
        $helper = Mage::helper('core');
        return $helper->uniqHash('catalogslideshow-');
    }

    public function isShow(){
        $category = $this->_getCategory();
        return $category && $category->getData('mt_catalogslideshow_enable');
    }

    public function getSlides(){
        $category = $this->_getCategory();
        if (!$category) return array();

        /* @var $helper Mage_Core_Helper_Data */
        $helper = Mage::helper('core');

        $data = $helper->jsonDecode($category->getData('mt_catalogslideshow_data'));
        if (is_array($data)){
            return $data;
        }else{
            return array();
        }
    }

    public function getConfig($name){
        /* @var $helper Mage_Core_Helper_Data */
        $helper = Mage::helper('core');
        $category = $this->_getCategory();
        $autoplay = $category->getData('mt_catalogslideshow_autoplay');

        switch ($name){
            case 'carousel':
                return $helper->jsonEncode(array(
                    'engine'        => Mage::getBaseUrl('js') . 'mt/extensions/jquery/plugins/owl-carousel/owl.carousel.js',
                    'singleItem'    => true,
                    'navigation'    => false,
                    'transitionStyle' => $category->getData('mt_catalogslideshow_transition'),
                    'pagination'    => (bool) $category->getData('mt_catalogslideshow_paging'),
                    'autoPlay'      => $autoplay == 0 ? false : (int) $autoplay,
                    'lazyLoad'      => true
                ));
                break;
            default:
                return '';
        }
    }
}

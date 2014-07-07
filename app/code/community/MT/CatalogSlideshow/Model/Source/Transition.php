<?php
/**
 * @category    MT
 * @package     MT_CatalogSlideshow
 * @copyright   Copyright (C) 2008-2014 MagentoThemes.net. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      MagentoThemes.net
 * @email       support@magentothemes.net
 */

class MT_CatalogSlideshow_Model_Source_Transition extends Mage_Eav_Model_Entity_Attribute_Source_Abstract{
    public function getAllOptions(){
        if (is_null($this->_options)){
            $this->_options = array(
                array('value' => 'fade', 'label' => Mage::helper('mtcatalogslideshow')->__('Fade')),
                array('value' => 'backSlide', 'label' => Mage::helper('mtcatalogslideshow')->__('Back Slide')),
                array('value' => 'goDown', 'label' => Mage::helper('mtcatalogslideshow')->__('Go Down')),
                array('value' => 'fadeUp', 'label' => Mage::helper('mtcatalogslideshow')->__('Fade Up'))
            );
        }

        return $this->_options;
    }
}

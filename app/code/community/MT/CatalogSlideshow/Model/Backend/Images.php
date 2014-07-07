<?php
/**
 * @category    MT
 * @package     MT_CatalogSlideshow
 * @copyright   Copyright (C) 2008-2014 MagentoThemes.net. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      MagentoThemes.net
 * @email       support@magentothemes.net
 */

class MT_CatalogSlideshow_Model_Backend_Images extends Mage_Eav_Model_Entity_Attribute_Backend_Abstract{
    public function beforeSave($object){
        /* @var $helper Mage_Core_Helper_Data */
        $helper = Mage::helper('core');
        $attributeName = $this->getAttribute()->getName();
        $value = $object->getData($attributeName);
        $data = array();

        if (!is_array($value)) return $this;

        $images = isset($value['images']) ? $value['images'] : array();
        $links  = isset($value['links']) ? $value['links'] : array();
        $targets = isset($value['targets']) ? $value['targets'] : array();

        foreach ($images as $i => $image){
            if (!$image) continue;
            $data[] = array(
                'url'   => $image,
                'link'  => isset($links[$i]) ? $links[$i] : null,
                'target'=> isset($targets[$i]) ? $targets[$i] : '_self'
            );
        }

        $object->setData($attributeName, $helper->jsonEncode($data));

        return $this;
    }
}

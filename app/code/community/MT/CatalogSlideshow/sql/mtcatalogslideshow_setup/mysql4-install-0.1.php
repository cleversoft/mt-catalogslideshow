<?php
/**
 * @category    MT
 * @package     MT_CatalogSlideshow
 * @copyright   Copyright (C) 2008-2014 MagentoThemes.net. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      MagentoThemes.net
 * @email       support@magentothemes.net
 */

$this->startSetup();

$this->removeAttribute('catalog_category', 'mt_catalogslideshow_enable');
$this->addAttribute('catalog_category', 'mt_catalogslideshow_enable', array(
    'group'     => 'Slide Show Settings',
    'label'     => 'Enable Slide Show',
    'input'     => 'select',
    'type'      => 'int',
    'source'    => 'eav/entity_attribute_source_boolean',
    'note'      => 'Select Yes to apply slide show for this category',
    'required'  => false,
    'global'    => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
));

$this->removeAttribute('catalog_category', 'mt_catalogslideshow_data');
$this->addAttribute('catalog_category', 'mt_catalogslideshow_data', array(
    'group'     => 'Slide Show Settings',
    'label'     => 'Slide Images',
    'input'     => 'text',
    'type'      => 'text',
    'input_renderer' => 'mtcatalogslideshow/adminhtml_catalog_category_helper_images',
    'backend'   => 'mtcatalogslideshow/backend_images',
    'required'  => false,
    'global'    => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
));

$this->removeAttribute('catalog_category', 'mt_catalogslideshow_transition');
$this->addAttribute('catalog_category', 'mt_catalogslideshow_transition', array(
    'group'     => 'Slide Show Settings',
    'label'     => 'Transition Style',
    'input'     => 'select',
    'source'    => 'mtcatalogslideshow/source_transition',
    'type'      => 'varchar',
    'note'      => 'Browsers support: IE 10+, Chrome 12+, Firefox 16+, Safari 4+, Opera 15+',
    'required'  => false,
    'global'    => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
));

$this->removeAttribute('catalog_category', 'mt_catalogslideshow_autoplay');
$this->addAttribute('catalog_category', 'mt_catalogslideshow_autoplay', array(
    'group'     => 'Slide Show Settings',
    'label'     => 'Auto Play',
    'input'     => 'text',
    'type'      => 'int',
    'note'      => 'Change to any integrer for example: 5000 to play every 5 seconds. Leave blank to disable autoplay',
    'required'  => false,
    'global'    => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
));

$this->removeAttribute('catalog_category', 'mt_catalogslideshow_paging');
$this->addAttribute('catalog_category', 'mt_catalogslideshow_paging', array(
    'group'     => 'Slide Show Settings',
    'label'     => 'Show Paging',
    'input'     => 'select',
    'type'      => 'int',
    'source'    => 'eav/entity_attribute_source_boolean',
    'note'      => 'Show pagination',
    'required'  => false,
    'global'    => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
));

$this->endSetup();

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
    'group'     => 'General Information',
    'input'     => 'text',
    'type'      => 'int',
    'backend'   => '',
    'visible'   => false,
    'required'  => false,
    'visible_on_front' => false,
    'global'    => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
));
$this->endSetup();

<?php
/**
 * @category    MT
 * @package     MT_Extensions
 * @copyright   Copyright (C) 2008-2013 MagentoThemes.net. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      MagentoThemes.net
 * @email       support@magentothemes.net
 */

class MT_Extensions_Helper_Data extends Mage_Core_Helper_Abstract{
    public function loadJsLibs($libs=array()){
        if (is_string($libs)) $libs = array($libs);
        $head = Mage::getSingleton('core/layout')->getBlock('head')->setCanLoadExtJs(true);
        foreach ($libs as $lib){
            switch ($lib){
                case 'jscolor':
                    $head->addJs('jscolor/jscolor.js');
                    break;
                case 'codemirror':
                    $head->addJs('mt/extensions/codemirror/codemirror.js')
                        ->addJs('mt/extensions/codemirror/mode/css.js')
                        ->addItem('js_css', 'mt/extensions/codemirror/codemirror.css');
                    break;
                case 'browser':
                    $head->addJs('lib/flex.js')
                        ->addJs('lib/FABridge.js')
                        ->addJs('mage/adminhtml/flexuploader.js')
                        ->addJs('mt/extensions/browser.js')
                        ->addJs('prototype/window.js')
                        ->addItem('js_css', 'prototype/windows/themes/default.css');
                    if (version_compare(Mage::getVersion(), '1.7.0.0') < 0){
                        $head->addItem('js_css', 'prototype/windows/themes/magento.css');
                    }else{
                        $head->addItem('skin_css', 'lib/prototype/windows/themes/magento.css');
                    }
                    break;
            }
        }
    }
}

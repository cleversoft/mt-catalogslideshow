<?php
/**
 * @category    MT
 * @package     MT_CatalogSlideshow
 * @copyright   Copyright (C) 2008-2014 MagentoThemes.net. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      MagentoThemes.net
 * @email       support@magentothemes.net
 */

class MT_CatalogSlideshow_Block_Adminhtml_Catalog_Category_Tab_Slider extends Mage_Adminhtml_Block_Catalog_Form{
    protected function _prepareLayout(){
        parent::_prepareLayout();

        $form = new Varien_Data_Form();
        $category = Mage::registry('current_category');

        $fieldset = $form->addFieldset('mt_catalogslideshow_fieldset', array(
            'legend' => Mage::helper('mtcatalogslideshow')->__('Slide Show Information')
        ));

        $f1 = $fieldset->addField('mt_catalogslideshow_enable', 'select', array(
            'name'      => 'mt_catalogslideshow_enable',
            'label'     => Mage::helper('mtcatalogslideshow')->__('Enable Slide Show'),
            'title'     => Mage::helper('mtcatalogslideshow')->__('Enable Slide Show'),
            'note'      => Mage::helper('mtcatalogslideshow')->__('Select Yes to apply slide show for this category'),
            'values'    => array(
                array('value' => '0', 'label' => Mage::helper('mtcatalogslideshow')->__('No')),
                array('value' => '1', 'label' => Mage::helper('mtcatalogslideshow')->__('Yes'))
            )
        ));
        $f2 = $fieldset->addField('mt_catalogslideshow_images', 'text', array(
            'name'  => 'mt_catalogslideshow_images',
            'label' => Mage::helper('mtcatalogslideshow')->__('Slide Images')
        ));
        $form->getElement('mt_catalogslideshow_images')->setRenderer(
            $this->getLayout()->createBlock('mtcatalogslideshow/adminhtml_widget_form_element_images')
                ->setData('category', Mage::registry('current_category'))
        );
        $f3 = $fieldset->addField('mt_catalogslideshow_transition', 'select', array(
            'name'      => 'mt_catalogslideshow_transition',
            'label'     => Mage::helper('mtcatalogslideshow')->__('Transition Style'),
            'title'     => Mage::helper('mtcatalogslideshow')->__('Transition Style'),
            'note'      => Mage::helper('mtcatalogslideshow')->__('Browsers support: IE 10+, Chrome 12+, Firefox 16+, Safari 4+, Opera 15+'),
            'values'    => array(
                array('value' => 'fade', 'label' => 'Fade'),
                array('value' => 'backSlide', 'label' => 'Back Slide'),
                array('value' => 'goDown', 'label' => 'Go Down'),
                array('value' => 'fadeUp', 'label' => 'Fade Up')
            )
        ));
        $f4 = $fieldset->addField('mt_catalogslideshow_autoplay', 'text', array(
            'name'      => 'mt_catalogslideshow_autoplay',
            'label'     => Mage::helper('mtcatalogslideshow')->__('Auto Play'),
            'title'     => Mage::helper('mtcatalogslideshow')->__('Auto Play'),
            'note'      => Mage::helper('mtcatalogslideshow')->__('Change to any integrer for example: 5000 to play every 5 seconds. Leave blank to disable autoplay')
        ));
        $f5 = $fieldset->addField('mt_catalogslideshow_paging', 'select', array(
            'name'      => 'mt_catalogslideshow_paging',
            'label'     => Mage::helper('mtcatalogslideshow')->__('Show Paging'),
            'title'     => Mage::helper('mtcatalogslideshow')->__('Show Paging'),
            'note'      => Mage::helper('mtcatalogslideshow')->__('Show pagination'),
            'values'    => array(
                array('value' => '0', 'label' => Mage::helper('mtcatalogslideshow')->__('No')),
                array('value' => '1', 'label' => Mage::helper('mtcatalogslideshow')->__('Yes'))
            )
        ));

        if ($category){
            $form->setValues($category->getData());
        }

        $this->setChild('form_after', $this->getLayout()->createBlock('adminhtml/widget_form_element_dependence')
            ->addFieldMap($f1->getHtmlId(), $f1->getName())
            ->addFieldMap($f2->getHtmlId(), $f2->getName())
            ->addFieldMap($f3->getHtmlId(), $f3->getName())
            ->addFieldMap($f4->getHtmlId(), $f4->getName())
            ->addFieldMap($f5->getHtmlId(), $f5->getName())
            ->addFieldDependence($f2->getName(), $f1->getName(), '1')
            ->addFieldDependence($f3->getName(), $f1->getName(), '1')
            ->addFieldDependence($f4->getName(), $f1->getName(), '1')
            ->addFieldDependence($f5->getName(), $f1->getName(), '1')
        );

        $this->setForm($form);
    }
}

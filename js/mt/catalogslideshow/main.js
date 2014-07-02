/**
 * @category    MT
 * @package     MT_CatalogSlideshow
 * @copyright   Copyright (C) 2008-2014 MagentoThemes.net. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      MagentoThemes.net
 * @email       support@magentothemes.net
 */

;'use strict';

var MT = MT || {};
MT.CatalogSlideShow = Class.create();
MT.CatalogSlideShow.prototype = {
    initialize: function(id, config){
        this.id = id;
        this.container = $(id);
        this.config = config || {};
        this.initCarousel(this.config.carousel);
    },
    initCarousel: function(config){
        if (!window['jQuery']) return;
        if (!jQuery.fn.owlCarousel){
            jQuery.getScript(config.engine, function(){
                this.bindCarouselElement(config);
            }.bind(this));
        }else{
            this.bindCarouselElement(config);
        }
    },
    bindCarouselElement: function(config){
        jQuery('#' + this.id).owlCarousel(config);
    }
};

/**
 * jQuery random background changer ES
 * @name Random Background Changer
 * @author Charles Harvey - http://www.charles-harvey.co.uk
 * @version 0.1
 * @date September 4 2009
 * @category jQuery plugin
 * @copyright (c) 2009 Charles Harvey
 */

(function($) {

  $.randombg = {
    defaults: {
      directory: "img/gif/",
      howmany: 3

    }
  }
    $.fn.extend({
        randombg:function(config) {
            var config = $.extend({}, $.randombg.defaults, config);
      return this.each(function() {
    
        var directory = config.directory, howmany = config.howmany;

        var which = Math.floor(Math.random()*howmany)+1;
        $(this).css({"background" : "url(" +directory + which + ".gif) no-repeat center center"});
        
            })
        }
    })
})(jQuery);
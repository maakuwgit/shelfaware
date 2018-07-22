/**
* tabs JS
* -----------------------------------------------------------------------------
*
* All the JS for the tabs component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-tabs',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this = this;

      $(window).on('resize', function(e){
        _this.refactor();
      });

      this.refactor();

    },

    showTab: function(e) {

      e.preventDefault();

      var target = e.data;

      $(this).siblings().removeClass('active');
      $(this).addClass('active').next().addClass('active');

      if( target ) target.refactor();

    },

    refactor: function(e) {
      var tabs  = $(this.selector()),
          dfn   = $(tabs).find('.tab__definition'),
          desc  = $(tabs).find('.tab__tabs__tab__description.active'),
          newHeight = desc.outerHeight();

      if( window.outerWidth > '767' ) {
        if( !dfn.attr('style') ) {
          tabs.on('click.showTab', '.tab__tabs__tab__title', this, this.showTab);
        }

        dfn.css({'margin-bottom': newHeight});
      }else{
        tabs.off('click.showTab');
        dfn.removeAttr('style');
      }

    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'tabs', COMPONENT );
} )( app );

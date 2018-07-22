/**
* three-col-block JS
* -----------------------------------------------------------------------------
*
* All the JS for the three-col-block component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-three-col-block',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this = this;

    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'three-col-block', COMPONENT );
} )( app );


var SPApp = {};

SPApp.UI = {
  doAjaxAction: function(json) {
    if (json.action == 'reload') {
      SPApp.UI.reloadPage();
    }
  }, 
  reloadPage: function(target) {
    if (typeof target == 'undefined') {
      target = '_blank';
    }

    if (target == '_blank') {
      window.location.reload(true); 
    } else if (target == '_parent') {
      window.opener.location.reload(true);
      window.close();
    }
  }

};

$(function () {
  "use strict";
});

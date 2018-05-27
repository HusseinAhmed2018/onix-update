 //--Preloaing Effect --
  jQuery(window).load(function () {

setTimeout(function(){
    jQuery('.loading-logo').css({'opacity' : 0 , 'display' : 'none'});
    jQuery('.all-wrapper').css({'opacity' : 1 , 'visibility' : 'visible'});  
    jQuery('body').css({'overflow':'auto','padding-top':'141px'});
}, 300);

  });
    
//-- customizing position of loading container --
  var jQueryloadingContainer = jQuery('.loading');

  jQueryloadingContainer.resize(function(){
    jQuery('.loading-logo').css({ 
      'margin-left' : - jQueryloadingContainer.width() / 2 , 
      'margin-top' : - jQueryloadingContainer.height()  / 2
    });
  });  
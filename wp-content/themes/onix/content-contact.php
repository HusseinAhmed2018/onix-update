<?php
/* #04ACFF
 * Template Name: Contact Us Page Template
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
the_post();

    $address=get_post_custom()['address'][0] ;
    $mobile=get_post_custom()['mobile'][0] ;
    $telephone=get_post_custom()['telephone'][0] ;
    $email=get_post_custom()['email'][0] ;
    $facebook=get_post_custom()['facebook'][0] ;
    $twitter=get_post_custom()['twitter'][0] ;
    $instagram=get_post_custom()['instagram'][0] ;
    $google_plus=get_post_custom()['google_plus'][0] ;
    $map=unserialize(get_post_custom()['map'][0]) ;

?>
        <div class="site-con">
          <div class="container">
            <div class="site-co">
              <h2><?=the_title()?></h2>
              <div class="contactform">
              <?=the_content()?>
                <div class="info">
                  <div>
                    <i class="fa fa-map-marker fa-lg"></i>
                    <span>Address:</span>
                      <a  href="https://www.google.com/maps/place/ONIX+FOR+MARBLE+%26+GRANITE/@30.129247,31.7536315,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xe55947a112e7a670!8m2!3d30.129247!4d31.7558202?hl=en">
                      <?=nl2br($address)?>
                      </a>
                  </div>
                   <?php if ( $telephone > '') { ?>
                  <div>
                    <i class="fa fa-phone fa-lg"></i>
                    <span>Tel:</span> <?=$telephone?>
                  </div>
                  <?php }?>
                  <?php if ( $mobile > '') { ?>
                  <div>
                    <i class="fa fa-mobile fa-lg"></i>
                    <span>Mob:</span> <?=$mobile?>
                  </div>
                  <?php }?>
                  <hr>
                   <?php if ( $email > '') { ?>
                  <div><i class="fa fa-envelope fa-lg"></i><span>Email:</span> <?=$email?></div>
                  <?php }?>
                  <div id="googleMap" style="width:500px;height:380px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDGhSZViJuHcCc6ImawiOvqhrQn6YvpPqk"></script>

    <script type="text/javascript">

    var myCenter=new google.maps.LatLng(<?=$map['lat']?>,<?=$map['lng']?>);

    function initialize()
    {
    var mapProp = {
      center:myCenter,
      zoom:10,
      mapTypeId:google.maps.MapTypeId.ROADMAP
      };

    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker=new google.maps.Marker({
      position:myCenter,
      });

    marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    (function() {
      var support = { transitions: Modernizr.csstransitions },
        // transition end event name
        transEndEventNames = { 'WebkitTransition': 'webkitTransitionEnd', 'MozTransition': 'transitionend', 'OTransition': 'oTransitionEnd', 'msTransition': 'MSTransitionEnd', 'transition': 'transitionend' },
        transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
        onEndTransition = function( el, callback ) {
          var onEndCallbackFn = function( ev ) {
            if( support.transitions ) {
              if( ev.target != this ) return;
              this.removeEventListener( transEndEventName, onEndCallbackFn );
            }
            if( callback && typeof callback === 'function' ) { callback.call(this); }
          };
          if( support.transitions ) {
            el.addEventListener( transEndEventName, onEndCallbackFn );
          }
          else {
            onEndCallbackFn();
          }
        };


    })();


  </script>

<?php get_footer(); ?>

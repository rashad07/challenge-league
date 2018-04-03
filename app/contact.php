<?php
include 'dbc.php';
include 'header.php';
?>
<html>
<body>
<div class="page-header" style="background: url(assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="page-title">Contact Us</h2>
<a href="index-2.php">Home</a>
<span>/</span>
<span class="current">Contact Us</span>
</div>
</div>
</div>
</div>
</div>
<section id="content">
<div class="container">
<div class="row">
<div class="col-md-6">
<h2 class="medium-title">Send A message</h2>

<form id="contactForm" class="contact-form" data-toggle="validator">
<div class="row">
<div class="col-md-6">
<input type="text" class="form-control" id="name" name="name" placeholder="Name:" required data-error="Please enter your name">
<div class="help-block with-errors"></div>
</div>
<div class="col-md-6">
<input type="email" class="form-control" id="email" placeholder="Email:" required data-error="Please enter your email">
<div class="help-block with-errors"></div>
</div>
<div class="col-md-12">
<textarea class="form-control" placeholder="Your Massage" rows="9" required data-error="Write your message"></textarea>
<div class="help-block with-errors"></div>
</div>
<div class="col-md-6">
<button type="submit" id="submit" class="btn btn-common">Send Now</button>
<div id="msgSubmit" class="hidden"></div>
<div class="clearfix"></div>
</div>
</div>
</form>
</div>
<div class="col-md-6">
<h2 class="medium-title">Contact Info</h2>
<div class="information">
<p>Her hansi melumat yazilacaq.</p>
<p>her hansi melumat yazilacaq.</p>
<div class="contact-datails">
<p><i class="fa fa-map-marker"></i> Baku, Azerbaijan</p>
<p><i class="fa fa-phone"></i> +994 50 200 00 00</p>
<p><i class="fa fa-envelope"></i> <a href="http://demo.graygrids.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="91f9f4fdfdfed1f3e3f8f6f9e5e4fff8e7f4e3e2f8e5e8bff4f5e4">[email&#160;protected]</a></p>
</div>
</div>
</div>
</div>
</div>
</section>


<div id="google-map"></div>


<?php
include 'footer.html';
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHo_WtZ2nIYCgCLf7sINZaqcrpqSDio9o"></script>

<script type="text/javascript">
      var map;
      var defult = new google.maps.LatLng(55.8638037, -4.2834354,13.67);
      var mapCoordinates = new google.maps.LatLng(55.8638037, -4.2834354,13.67); 
      
      
      var markers = [];
      var image = new google.maps.MarkerImage(
        'assets/img/map-marker.png',
        new google.maps.Size(84, 70),
        new google.maps.Point(0, 0),
        new google.maps.Point(60, 60)
      );
      
      function addMarker() {
        markers.push(new google.maps.Marker({
          position: defult,
          raiseOnDrag: false,
          icon: image,
          map: map,
          draggable: false
        }
      ));
        
      }
      
      function initialize() {
        var mapOptions = {
          backgroundColor: "#ffffff",
          zoom: 15,
          disableDefaultUI: true,
          center: mapCoordinates,
          zoomControl: false,
          scaleControl: false,
          scrollwheel: false,
          disableDoubleClickZoom: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          styles: [{
            "featureType": "landscape.natural",
            "elementType": "geometry.fill",
            "stylers": [{
              "color": "#ffffff"
            }
                       ]
          }
                   , {
                     "featureType": "landscape.man_made",
                     "stylers": [{
                       "color": "#ffffff"
                     }
                                 , {
                                   "visibility": "off"
                                 }
                                ]
                   }
                   , {
                     "featureType": "water",
                     "stylers": [{
                       "color": "#80C8E5"
                     }
                                 , {
                                   "saturation": 0
                                 }
                                ]
                   }
                   , {
                     "featureType": "road.arterial",
                     "elementType": "geometry",
                     "stylers": [{
                       "color": "#999999"
                     }
                                ]
                   }
                   , {
                     "elementType": "labels.text.stroke",
                     "stylers": [{
                       "visibility": "off"
                     }
                                ]
                   }
                   , {
                     "elementType": "labels.text",
                     "stylers": [{
                       "color": "#333333"
                     }
                                ]
                   }
                   
                   , {
                     "featureType": "road.local",
                     "stylers": [{
                       "color": "#dedede"
                     }
                                ]
                   }
                   , {
                     "featureType": "road.local",
                     "elementType": "labels.text",
                     "stylers": [{
                       "color": "#666666"
                     }
                                ]
                   }
                   , {
                     "featureType": "transit.station.bus",
                     "stylers": [{
                       "saturation": -57
                     }
                                ]
                   }
                   , {
                     "featureType": "road.highway",
                     "elementType": "labels.icon",
                     "stylers": [{
                       "visibility": "off"
                     }
                                ]
                   }
                   , {
                     "featureType": "poi",
                     "stylers": [{
                       "visibility": "off"
                     }
                                ]
                   }
                   
                  ]
          
        }
            ;
        map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
        addMarker();
        
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</body>

<!-- Mirrored from demo.graygrids.com/themes/bricontact.phphtml by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Mar 2018 19:59:00 GMT -->
</html>
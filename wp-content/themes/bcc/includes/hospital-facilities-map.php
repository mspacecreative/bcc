<style type="text/css">
.info_content {
	padding: 15px;
}

.info_content a {
	display: inline-block;
	margin: 15px 0 0;
	background: #3F5BA9;
	color: #fff;
	padding: 10px 15px;
	margin-right: 15px;
	text-decoration: none;
}

.info_content h3 {
	margin-bottom: 0;
}

.info_content p {
	margin-top: 5px;
}

#phoneNumber {
	text-align: center;
	color: #fff;
	font-size: 20px;
}

.gm-style-pbc {
	background-color: rgba(255, 255, 255, 0.75)!important;
}

.gm-ui-hover-effect, .gm-ui-hover-effect img {
	width: 40px!important;
	height: 40px!important;
	top: 0!important;
	right: 0!important;
}

.gm-ui-hover-effect img {
	padding: 5px!important;
	margin: 0!important;
}
.acf-map-container {
	height: 500px;
}
.acf-map {
    width: 100%;
    height: 100%;
    border: none;
    margin: 20px 0;
}

/* Fixes potential theme css conflict. */
.acf-map img {
   max-width: inherit !important;
}
</style>
<script type="text/javascript">
(function( $ ) {

/**
 * initMap
 *
 * Renders a Google Map onto the selected jQuery element
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @return  object The map instance.
 */
function initMap( $el ) {

    // Find marker elements within map.
    var $markers = $el.find('.marker');

    // Create gerenic map.
    var mapArgs = {
        zoom        : $el.data('zoom') || 16,
        mapTypeId   : google.maps.MapTypeId.ROADMAP,
		styles: [
				    {
				        "featureType": "water",
				        "elementType": "geometry",
				        "stylers": [
				            {
				                "color": "#e9e9e9"
				            },
				            {
				                "lightness": 17
				            }
				        ]
				    },
				    {
				        "featureType": "landscape",
				        "elementType": "geometry",
				        "stylers": [
				            {
				                "color": "#f5f5f5"
				            },
				            {
				                "lightness": 20
				            }
				        ]
				    },
				    {
				        "featureType": "road.highway",
				        "elementType": "geometry.fill",
				        "stylers": [
				            {
				                "color": "#ffffff"
				            },
				            {
				                "lightness": 17
				            }
				        ]
				    },
				    {
				        "featureType": "road.highway",
				        "elementType": "geometry.stroke",
				        "stylers": [
				            {
				                "color": "#ffffff"
				            },
				            {
				                "lightness": 29
				            },
				            {
				                "weight": 0.2
				            }
				        ]
				    },
				    {
				        "featureType": "road.arterial",
				        "elementType": "geometry",
				        "stylers": [
				            {
				                "color": "#ffffff"
				            },
				            {
				                "lightness": 18
				            }
				        ]
				    },
				    {
				        "featureType": "road.local",
				        "elementType": "geometry",
				        "stylers": [
				            {
				                "color": "#ffffff"
				            },
				            {
				                "lightness": 16
				            }
				        ]
				    },
				    {
				        "featureType": "poi",
				        "elementType": "geometry",
				        "stylers": [
				            {
				                "color": "#f5f5f5"
				            },
				            {
				                "lightness": 21
				            }
				        ]
				    },
				    {
				        "featureType": "poi.park",
				        "elementType": "geometry",
				        "stylers": [
				            {
				                "color": "#dedede"
				            },
				            {
				                "lightness": 21
				            }
				        ]
				    },
				    {
				        "elementType": "labels.text.stroke",
				        "stylers": [
				            {
				                "visibility": "on"
				            },
				            {
				                "color": "#ffffff"
				            },
				            {
				                "lightness": 16
				            }
				        ]
				    },
				    {
				        "elementType": "labels.text.fill",
				        "stylers": [
				            {
				                "saturation": 36
				            },
				            {
				                "color": "#333333"
				            },
				            {
				                "lightness": 40
				            }
				        ]
				    },
				    {
				        "elementType": "labels.icon",
				        "stylers": [
				            {
				                "visibility": "off"
				            }
				        ]
				    },
				    {
				        "featureType": "transit",
				        "elementType": "geometry",
				        "stylers": [
				            {
				                "color": "#f2f2f2"
				            },
				            {
				                "lightness": 19
				            }
				        ]
				    },
				    {
				        "featureType": "administrative",
				        "elementType": "geometry.fill",
				        "stylers": [
				            {
				                "color": "#fefefe"
				            },
				            {
				                "lightness": 20
				            }
				        ]
				    },
				    {
				        "featureType": "administrative",
				        "elementType": "geometry.stroke",
				        "stylers": [
				            {
				                "color": "#fefefe"
				            },
				            {
				                "lightness": 17
				            },
				            {
				                "weight": 1.2
				            }
				        ]
				    }
				]
    };
    var map = new google.maps.Map( $el[0], mapArgs );

    // Add markers.
    map.markers = [];
    $markers.each(function(){
        initMarker( $(this), map );
    });

    // Center map based on markers.
    centerMap( map );
	
	// add marker cluster
	markerCluster( map.markers, map )

    // Return map instance.
    return map;
}

/**
 * initMarker
 *
 * Creates a marker for the given jQuery element and map.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @param   object The map instance.
 * @return  object The marker instance.
 */
var activeInfoWindow;
function initMarker( $marker, map ) {

    // Get position from marker.
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = {
        lat: parseFloat( lat ),
        lng: parseFloat( lng )
    };

    // Create marker instance.
    var marker = new google.maps.Marker({
        position : latLng,
        map: map,
		icon: {
	      url: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png"
	    }
    });

    // Append to reference for later use.
    map.markers.push( marker );

    // If marker contains HTML, add it to an infoWindow.
    if( $marker.html() ){

        // Create info window.
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });

	    // Show info window when marker is clicked.
	    google.maps.event.addListener(marker, 'click', function() {
	        map.setCenter(marker.getPosition());
			map.panBy(0,-100);
			if (activeInfoWindow) { 
				activeInfoWindow.close();
			}
	        infowindow.open(map, marker);
	        activeInfoWindow = infowindow;
		});
    }
}

function markerCluster( markers, map ) {
    var markerCluster = new MarkerClusterer(map, markers, {
		imagePath: 'https://breastfeedingcanada.ca/wp-content/themes/bcc/includes/img/m',
	});
}

/**
 * centerMap
 *
 * Centers the map showing all markers in view.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   object The map instance.
 * @return  void
 */
function centerMap( map ) {

    // Create map boundaries from all map markers.
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function( marker ){
        bounds.extend({
            lat: marker.position.lat(),
            lng: marker.position.lng()
        });
    });

    // Case: Single marker.
    if( map.markers.length == 1 ){
        map.setCenter( bounds.getCenter() );

    // Case: Multiple markers.
    } else{
        map.fitBounds( bounds );
    }
	
	// Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(4);
        google.maps.event.removeListener(boundsListener);
    });
}

// Render maps on page load.
$(document).ready(function(){
    $('.acf-map').each(function(){
        var map = initMap( $(this) );
    });
});

})(jQuery);
</script>

<?php 
$loop = new WP_Query( array( 'post_type' => 'hospital_facility', 'posts_per_page' => -1 ) );
if ( $loop->have_posts() ) : ?>
<div class="acf-map-container">
	<div class="acf-map" data-zoom="4">
		<?php while ( $loop->have_posts() ) : $loop->the_post();
		
		// Load sub field values.
	    $location = get_field('coordinates', $post->ID); ?>
		
		<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
			<div class="info_content">
				<h3 style="margin-top: 0;"><?php the_title(); ?></h3>
		        <?php if ( $location ) {
		        	echo '<p>' . $location['address'] . '</p>';
		        } else {
	        		echo '<p>' . the_content() . '</p>';
	        	} ?>
				<?php if( have_rows('cta_buttons', $post->ID) ):
				while( have_rows('cta_buttons', $post->ID) ): the_row();
				$weblink = get_sub_field('website_link', $post->ID);
				$phone = get_sub_field('phone_number', $post->ID);
				
				$currentlang = get_bloginfo('language');
				if ( $currentlang == 'en-CA' ) {
					if ( $weblink ) {
						echo '<a class="gm-website" href="' . $weblink . '" target="_blank">VISIT WEBSITE</a>';
					} 
					if ( $phone ) {
						echo '<a class="gm-phone" href="tel:+1' . $phone . '">CALL</a>';
					}
				} elseif ( $currentlang == 'fr-FR' ) {
					if ( $weblink ) {
						echo '<a class="gm-website" href="' . $weblink . '" target="_blank">Visitez le site web</a>';
					} 
					if ( $phone ) {
						echo '<a class="gm-phone" href="tel:+1' . $phone . '">Appel</a>';
					}
				}
				
				endwhile;
				endif; ?>
		    </div>
	    </div>
		
		<?php endwhile; ?>
	</div>
</div>
<?php endif; wp_reset_postdata(); ?>
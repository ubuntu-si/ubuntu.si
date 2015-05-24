<!-- service section -->
<?php $wl_theme_options = weblizar_get_options(); ?>
<div class="enigma_service">
<?php if($wl_theme_options['home_service_heading'] !='') { ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="enigma_heading_title">
				<h3>Preberite še</h3>		
			</div>
		</div>
	</div>
</div>	
<?php } ?>
<div class="container">
		<div class="row isotope" id="isotope-service-container">		
			<div class=" col-md-4 service">
				<div class="enigma_service_area appear-animation bounceIn appear-animation-visible">
					<div class="enigma_service_iocn pull-left">
							<i class="fa fa-rss"></i>
					</div>
					<div class="enigma_service_detail media-body">
						<?php _e( 'Zadnje novice', 'my-text-domain' ); ?>
						<?php // Get RSS Feed(s)
						include_once( ABSPATH . WPINC . '/feed.php' );
						// Get a SimplePie feed object from the specified feed source.
						$rss = fetch_feed( 'https://www.ubuntu.si/feed/' );
						$maxitems = 0;
						if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly
							// Figure out how many total items there are, but limit it to 5. 
							$maxitems = $rss->get_item_quantity( 5 ); 
							// Build an array of all the items, starting with element 0 (first element).
							$rss_items = $rss->get_items( 0, $maxitems );
						endif;
						?>
						<ul>
							<?php if ( $maxitems == 0 ) : ?>
								<li><?php _e( 'No items', 'my-text-domain' ); ?></li>
							<?php else : ?>
								<?php // Loop through each feed item and display each item as a hyperlink. ?>
								<?php foreach ( $rss_items as $item ) : ?>
									<li>
										<a href="<?php echo esc_url( $item->get_permalink() ); ?>"
											title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
											<?php echo esc_html( $item->get_title() ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>					
					</div>
				</div>
			</div>
			<div class=" col-md-4 service">
				<div class="enigma_service_area appear-animation bounceIn appear-animation-visible">
					<div class="enigma_service_iocn pull-left">
							<i class="fa fa-rss"></i>
					</div>
					<div class="enigma_service_detail media-body">
						<?php _e( 'Zadnja sporočila s foruma', 'my-text-domain' ); ?>
						<?php // Get RSS Feed(s)
						include_once( ABSPATH . WPINC . '/feed.php' );

						// Get a SimplePie feed object from the specified feed source.
						$rss = fetch_feed( 'https://www.ubuntu.si/forum/discussions/all/feed.rss' );

						$maxitems = 0;

						if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly

							// Figure out how many total items there are, but limit it to 5. 
							$maxitems = $rss->get_item_quantity( 5 ); 

							// Build an array of all the items, starting with element 0 (first element).
							$rss_items = $rss->get_items( 0, $maxitems );

						endif;
						?>

						<ul>
							<?php if ( $maxitems == 0 ) : ?>
								<li><?php _e( 'No items', 'my-text-domain' ); ?></li>
							<?php else : ?>
								<?php // Loop through each feed item and display each item as a hyperlink. ?>
								<?php foreach ( $rss_items as $item ) : ?>
									<li>
										<a href="<?php echo esc_url( $item->get_permalink() ); ?>"
											title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
											<?php echo esc_html( $item->get_title() ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>					
					</div>
				</div>
			</div>
			<div class=" col-md-4 service">
				<div class="enigma_service_area appear-animation bounceIn appear-animation-visible">
					<div class="enigma_service_detail media-body">
					Zanimive povezave
					<ul>
						<li>Prva povezava (ogled)</li>
						<li>Druga povezava (predstavitev)</li>
						<li>Tretja povezava nekaj tretjega? PDF?</li>
						<li>Povezava do youtubea?</li>
					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	 
<!-- /Service section -->

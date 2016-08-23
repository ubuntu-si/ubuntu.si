<!-- service section -->
<?php $wl_theme_options = weblizar_get_options(); ?>
<div class="enigma_service">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="enigma_heading_title">
          <h2>Preberite še</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row isotope" id="isotope-service-container">
      <div class="col-md-4 service">
        <div class="enigma_service_area appear-animation bounceIn appear-animation-visible">
          <div class="enigma_service_iocn pull-left">
              <i class="fa fa-rss"></i>
          </div>
          <div class="wordpress_feed enigma_service_detail media-body">
            <h3>Zadnje s foruma</h3>
            <?php // Get RSS Feed(s)
            include_once( ABSPATH . WPINC . '/feed.php' );
            // Get a SimplePie feed object from the specified feed source.
            $rss = fetch_feed( 'https://www.ubuntu.si/forum/discussions/feed.rss' );
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
      <div class="col-md-4 service">
        <div class="enigma_service_area appear-animation bounceIn appear-animation-visible">
          <div class="enigma_service_iocn pull-left">
              <i class="fa fa-cloud-download"></i>
          </div>
          <div class="forum_feed enigma_service_detail media-body">
            <h3>Priporočamo prejem LTS različic</h3>
            <ul>
              <li><a href="http://ftp.arnes.si/pub/mirrors/ubuntu-cdimage/releases/16.04/ubuntu-16.04.1-desktop-amd64.iso.torrent">Ubuntu 16.04.1 LTS</a></li>
              <li><a href="http://cdimage.ubuntu.com/kubuntu/releases/16.04/release/kubuntu-16.04.1-desktop-amd64.iso.torrent">Kubuntu 16.04.1 LTS</a></li>
              <li><a href="http://cdimage.ubuntu.com/xubuntu/releases/16.04/release/xubuntu-16.04.1-desktop-amd64.iso.torrent">Xubuntu 16.04.1 LTS</a></li>
              <li><a href="http://cdimage.ubuntu.com/ubuntu-gnome/releases/16.04/release/ubuntu-gnome-16.04.1-desktop-amd64.iso.torrent">Ubuntu GNOME 16.04.1 LTS</a></li>
              <li><a href="http://cdimage.ubuntu.com/ubuntu-mate/releases/16.04/release/ubuntu-mate-16.04.1-desktop-amd64.iso.torrent">Ubuntu MATE 16.04.1 LTS</a></li>            
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-4 service">
        <div class="enigma_service_area appear-animation bounceIn appear-animation-visible">
					<div class="enigma_service_iocn pull-left">
						<i class="fa fa-link"></i>
          </div>
          <div class="other_links enigma_service_detail media-body">
          <h3>Druge zanimive povezave</h3>
          <ul>
            <li><a href="//www.ubuntu.si/vodnik/14.04/">Namizni vodnik Ubuntu</a></li>
            <li><a href="//www.ubuntu.si/ogled/sl/">Oglejte si kako je videti Ubuntu</a></li>
            <li><a href="//www.ubuntu.si/predstavitev/">Predstavitev Ubuntu</a></li>
            <li><a href="http://matej.owca.info/linux/Linux_na_namizju.pdf">PDF knjiga Linux na namizju</a></li>
            <li><a href="//www.ubuntu.si/povezave/">Več povezav</a></li>
          </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Service section -->

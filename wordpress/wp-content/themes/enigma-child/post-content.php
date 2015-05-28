<div id="post-<?php the_ID(); ?>" <?php post_class('enigma_blog_full'); ?>>
	<ul class="blog-date-left">
		<li class="enigma_post_date">
		<?php if ( ('d M  y') == get_option( 'date_format' ) ) : ?>
		<span class="date"><?php echo get_the_date('d'); ?></span><h6><?php echo get_the_date('M  y'); ?></h6>
		<?php else : ?>
		<span class="date"><?php echo get_the_date('j. M, Y'); ?></span>
		<?php endif; ?>
		</li>
		<li class="enigma_post_author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author(); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a></li>
		<li class="enigma_blog_comment"><?php echo wp2vanilla_post_comments(); ?>Komentiraj</li>
	</ul>
	<div class="post-content-wrap">
		<div class="enigma_fuul_blog_detail_padding">
		<h2><?php if(!is_single()) {?><a href="<?php the_permalink(); ?>"><?php } ?><?php the_title(); ?></a></h2>
		<?php the_content( __( 'Read More' , 'weblizar' ) );
		$defaults = array(
              'before'           => '<div class="enigma_blog_pagination"><div class="enigma_blog_pagi">' . __( 'Pages:','weblizar'  ),
              'after'            => '</div></div>',
	          'link_before'      => '',
	          'link_after'       => '',
	          'next_or_number'   => 'number',
	          'separator'        => ' ',
	          'nextpagelink'     => __( 'Next page'  ,'weblizar' ),
	          'previouspagelink' => __( 'Previous page' ,'weblizar'),
	          'pagelink'         => '%',
	          'echo'             => 1
	          );
	          wp_link_pages( $defaults ); ?>
		</div>
	</div>
</div>
<div class="push-right">
<hr class="blog-sep header-sep">
</div>

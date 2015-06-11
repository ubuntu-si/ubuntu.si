<div class="enigma_blog_area ">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="enigma_heading_title">
					<h3>Zadnje novice</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row" id="enigma_blog_section">
		  <?php 	if ( have_posts()) :
				$args = array( 'post_type' => 'post','posts_per_page' => 3);
				$post_type_data = new WP_Query( $args );
				while($post_type_data->have_posts()):
				$post_type_data->the_post(); ?>
				<div class="col-md-4 col-sm-12 scrollimation scale-in d2 pull-left">
					<div class="enigma_blog_thumb_wrapper">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php if(get_the_tag_list() != '') { ?>
						<p class="enigma_tags"><?php the_tags('Tags :&nbsp;', '', '<br />'); ?></p>
						<?php } ?>
						<?php the_excerpt( __( 'Read More' , 'weblizar' ) ); ?>
						<a href="<?php the_permalink(); ?>" class="enigma_blog_read_btn"><i class="fa fa-plus-circle"></i><?php _e('Read More','weblizar'); ?></a>
						<div class="enigma_blog_thumb_footer">
							<ul class="enigma_blog_thumb_date">
								<li><i class="fa fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></li>
								<li><i class="fa fa-clock-o"></i>
								<?php if ( ('d M  y') == get_option( 'date_format' ) ) : ?>
								<?php echo esc_html(get_the_date('d F ,Y')); ?>
								<?php else : ?>
								<?php echo esc_html(get_the_date('j. M, Y')); ?>
								<?php endif; ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<?php  endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

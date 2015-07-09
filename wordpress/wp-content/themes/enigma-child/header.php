<!DOCTYPE html>
<!--[if lt IE 7]>
    <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>
    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>
    <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta charset="<?php bloginfo('charset'); ?>" />	
	<?php $wl_theme_options = weblizar_get_options(); ?>
	<?php if($wl_theme_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo esc_url($wl_theme_options['upload_image_favicon']); ?>" /> 
	<?php } ?>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
</head>
<body <?php body_class(); ?>>
<div>
	<!-- Navigation  menus -->
	<div class="navigation_menu" id="enigma_nav_top">
		<div class="container navbar-container" >
			<nav class="navbar navbar-default " role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
					  <span class="sr-only"><?php _e('Toggle navigation','weblizar');?></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
					<button type="button" class="navbar-toggle navbar-back" onclick="history.back()">
						<span class="sr-only"><?php _e('Nazaj','weblizar');?></span>
						<span class="glyphicon glyphicon-arrow-left"></span>
					</button>
					<!-- Logo -->

					<a id="logo" class="hidden-sm" href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php
						if($wl_theme_options['text_title'] =="1")
						{ echo get_bloginfo('name'); }
						else if($wl_theme_options['upload_image_logo']!='')
						{ ?>
							<img src="<?php echo $wl_theme_options['upload_image_logo']; ?>" style="height:<?php if($wl_theme_options['height']!='') { echo $wl_theme_options['height']; }  else { echo "80"; } ?>px; width:<?php if($wl_theme_options['width']!='') { echo $wl_theme_options['width']; }  else { echo "200"; } ?>px;" alt="Logo" />
						<?php } else { echo __('Enigma','weblizar'); } ?>
					</a>
					<!-- /Logo -->
				</div>
				<div id="menu" class="collapse navbar-collapse ">
				<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class' => 'nav navbar-nav',
						'fallback_cb' => 'weblizar_fallback_page_menu',
						'walker' => new weblizar_nav_walker(),
						)
						);	?>
				</div>
			</nav>
		</div>
	</div>
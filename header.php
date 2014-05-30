<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Sharp
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> ng-app="sharp">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> ng-controller="AppCtrl">
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header blog-masthead" role="banner">
		<div class="container">
			<nav class="blog-nav">
				<?php 
					$menuParameters = array(
					  'container'       => false,
					  'echo'            => false,
					  'items_wrap'      => '%3$s',
					  'depth'           => 0,
					  'link_before'			=> '<span class="blog-nav-item">',
					  'link_after'			=> '</span>'
					);
					echo strip_tags(wp_nav_menu( $menuParameters ), '<span><a>' );
				?>
			</nav>
		</div>
	</header><!-- #masthead -->
	<div class="container">
		<div class="site-branding blog-header">
			<h1 class="site-title blog-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description lead blog-description"><?php bloginfo( 'description' ); ?></p>
		</div>
	
		<div id="content" class="site-content">


			<!-- 		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sharp' ); ?></a>-->
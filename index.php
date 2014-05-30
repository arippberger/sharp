<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sharp
 */

get_header(); ?>


		<div id="primary" class="content-area col-sm-8 blog-main">
			<main id="main" class="site-main" role="main">

				<div ng-view></div>

			</main><!-- #main -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

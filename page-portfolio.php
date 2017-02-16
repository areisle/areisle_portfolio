<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package areisle_portfolio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

        <?php //conditions
        $args = array( 
            'post_type' => array('work','snippet'),
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC'
         );
        //variable, can name it as you wish
        $work = new WP_Query( $args );

        //Loop starts
        if ( $work->have_posts() ) { 
            while ( $work->have_posts() ) {
                $work->the_post();
                ?>
                <p>
                <?php
                the_title();
                ?>
                </p>
                <?php
            }
            wp_reset_postdata(); 
        } ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

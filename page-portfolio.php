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
<!--       <div class="box"></div>-->
        <nav class="main-portfolio-nav">
        <?php //conditions
        $args = array( 
            'post_type' => array('work'),
            'posts_per_page' => -1,
            'orderby' => 'excerpt',
            'order' => 'ASC'
         );
        //variable, can name it as you wish
        $work = new WP_Query( $args );

        //Loop starts
        if ( $work->have_posts() ) {
            ?>
            <ul class="works-list">
            <?php
            while ( $work->have_posts() ) {
                $work->the_post();
                ?>
                <li class="work" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
                <a href="<?php the_permalink() ?>" >
                <h2>
                <?php
                the_title();
                ?>
                </h2>
                </a>
                </li>
                <?php
            }
            wp_reset_postdata(); 
            ?>
            </ul>
            <?php
        } ?>
        </nav>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

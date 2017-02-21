<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package areisle_portfolio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();
            ?>
            <nav class="post-navigation">
                <ul>
                    <li><a href="#overview">Overview</a></li>
                    <li><a href="#process">Process/ Snippets</a></li>
                    <li><a href="#critique">Critique</a></li>
                    <?php
                    if (function_exists ('get_field')){
                        if(get_field('github')){ ?>
                            <!-- github repo link -->
                            <li>
                                <a href="<?php the_field('github'); ?>" target="_blank">Github</a>
                            </li>
                        <?php
                        }
                        if(get_field('live_link')){ ?>
                            <!-- github repo link -->
                            <li>
                                <a href="<?php the_field('live_link'); ?>" target="_blank">View Live</a>
                            </li>
                        <?php
                        }
                    }?>
                </ul>
            </nav>
            
            <h1><?php the_title(); ?></h1>
            <section id="overview" class="overview">
                <?php
                if (function_exists ('get_field')){
                    if(get_field('criteria')){
                        the_field('criteria');	
                    }
                }?>
                <?php the_content(); ?>
            </section>
            
            <!-- process/ snippets -->
                <?php
                if (function_exists ('get_field')){
                    if(get_field('process/_snippets')){ ?>
                        <section id="process" class="process">
                        <?php
                        the_field('process/_snippets');	
                        ?>
                        </section>
                        <?php
                    }
                }?>
            
            <!-- critique -->
            <section id="critique" class="critique">
                <?php
                if (function_exists ('get_field')){
                    if(get_field('critique')){
                        the_field('critique');	
                    }
                }?>
            </section>
            
            
            <?php previous_post_link(); ?>
            <?php next_post_link(); ?>
            <?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>

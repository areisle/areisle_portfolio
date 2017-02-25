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
            <nav class="post-navigation hide">
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
            
            <?php

            if( have_rows('gallery_large') ): ?>
               <figure class="gallery">
                <div class="outer-wrapper large">
                    <div class="inner-wrapper">
                    <?php
                    $count = 0;
                    while ( have_rows('gallery_large') ) : the_row();
                        $count++;
                        $img = get_sub_field('gallery_image_large');
                        ?>
                        <img class="inner" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                        <?php
                    endwhile;
                    ?>
                </div>
                    <img class="border" src="<?php echo get_template_directory_uri().'/images/laptop.svg'; ?>" alt="">
                </div>
                <figcaption>
                <?php
                while ( have_rows('gallery_large') ) : the_row();
                        $img = get_sub_field('gallery_image_large');
                        ?>
                        <h3><?php echo $img['title'];?></h3>
                        <p><?php echo $img['caption'];?></p>
                        <?php
                    endwhile;
                   ?></figcaption>
                <?php
                if ($count > 1):
                ?>
                <nav class="gallery-nav">
                    <button class="btn btn-previous"></button>
                    
                    <ul class="inner-nav">
                        <?php
                        for ($x = 0; $x < $count; $x++):
                        ?>
                        <li <?php echo ($x === $count - 1)?'class="active"':''; ?> ><button></button></li>
                        <?php
                        endfor;
                        ?>
                    </ul>
                    <button class="btn btn-next"></button>
                </nav> 
                <?php
                endif;
                ?>
                <?php
                if( have_rows('gallery_small') ): ?>
                <div class="outer-wrapper small">
                    <div class="inner-wrapper">
                    <?php
                    while ( have_rows('gallery_small') ) : the_row();
                        $img = get_sub_field('gallery_image_small');
                        ?>
                        <img class="inner" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                        <?php
                    endwhile;
                    ?>
                </div>
                    <img class="border" src="<?php echo get_template_directory_uri().'/images/phone.svg'; ?>" alt="">
                </div>
                <?php
                endif;
                ?>
                </figure>
                <?php
            endif;

            ?>
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
            
            
            <nav class="post-navigation">
                <?php echo get_previouspost_link(); ?>
                <?php echo get_nextpost_link(); ?>
            </nav>
            <?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>

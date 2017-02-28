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
		<main id="main" class="site-main single-work" role="main">

		<?php
		while ( have_posts() ) : the_post();
            ?>
            <nav id="inner-post-navigation" class="inner-post-navigation">
                <div id="floating-box" class="floating-box"></div>
                <ul>
                    <li><a href="#overview" class="active">Overview</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#process">Process</a></li>
                    <li><a href="#snippets">Snippets</a></li>
                    <li><a href="#critique">Critique</a></li>
                </ul>
            </nav>
            
            <section id="overview" class="overview">
               <div>
                <h1><?php the_title(); ?></h1>
                <nav>
                    <ul>
                    <?php
                    if (function_exists ('get_field')){
                        if(get_field('github')){ ?>
                            <!-- github repo link -->
                            <li>
                                <a href="<?php the_field('github'); ?>" target="_blank">Github Repo</a>
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
                </div>
               <div class="wrapper">
                <?php the_content(); ?>
                
                </div>
            </section>
            
            <?php
            
            if( have_rows('gallery_large') ): ?>
              <section id="gallery" class="gallery">
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
                <figcaption class="outer-wrapper">
                <div class="inner-wrapper">
                <?php
                while ( have_rows('gallery_large') ) : the_row();
                        $img = get_sub_field('gallery_image_large');
                        ?>
                        <div class="inner">
                        <h3><?php echo $img['title'];?></h3>
                        <p><?php echo $img['description'];?></p>
                        </div>
                        <?php
                    endwhile;
                   ?>
                    </div>
                </figcaption>
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
            </section>
                <?php
            endif;

            ?>
            <!-- process/ snippets -->
            <?php
            if (function_exists ('get_field')){
                if(get_field('process')){ ?>
                    <section id="process" class="process">
                    <?php
                    the_field('process');	
                    ?>
                    </section>
                    <?php
                }
            }?>
            <?php
            if (function_exists ('get_field')){
                if(have_rows('snippets')){ ?>
                    <section id="snippets" class="snippets simple">
                    <?php
                    while ( have_rows('snippets') ) : the_row();
                    ?>
                        <div class="snippet">
                            <h2><?php the_sub_field('snippet_title'); ?></h2>
                            <p><?php the_sub_field('snippet_description'); ?></p>
                            <?php the_sub_field('embed_code'); ?>
                        </div>
                        <?php
                    endwhile;	
                    ?>
                    </section>
                    <?php
                }
            }?>
            <!-- critique -->
            
            <section id="critique" class="critique simple">
                
                <!-- bugs -->
                <?php
                if(have_rows('critique')): ?>
                <section>
                <h2>Things to improve</h2>
                <ul class="wrapper">
                <?php
                while ( have_rows('critique') ) : the_row();
                ?>
                    <li><?php the_sub_field('error'); ?></li>
                    
                <?php
                endwhile;
                ?>
                </ul>
                </section>
                <?php
                endif;
                ?>
                <!-- improvements -->
                <?php
                if(have_rows('planned_features')): ?>
                <section>
                <h2>Planned Features</h2>
                <ul class="wrapper">
                <?php
                while ( have_rows('planned_features') ) : the_row();
                ?>
                    <li><?php the_sub_field('feature'); ?></li>
                    
                <?php
                endwhile;
                ?>
                </ul>
                </section>
                <?php
                endif;
                ?>
            </section>
            
            <nav class="post-navigation btn-link">
               <ul>
                <li><?php echo get_previouspost_link(); ?></li>
                <li><?php echo get_nextpost_link(); ?></li>
                </ul>
            </nav>
            <?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>

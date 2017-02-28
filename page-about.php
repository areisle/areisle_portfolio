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
		<main id="main" class="site-main contact" role="main">
        <?php
            //links to check out my code: github, codepen, jsfiddle
            //contact links: email, linkedin
        ?>
        <section class="code-social">
        
        <a href="mailto:areisle@gmail.com" class="email">areisle@gmail.com</a>
        <nav>
            <ul>
                <li><a href="https://github.com/areisle/"><div class="icon github" aria-hidden="true"></div><span>GitHub </span></a></li>
                <li><a href="http://www.linkedin.com/in/areisle"><div class=" icon linkedin" aria-hidden="true"></div><span>Linkedin </span></a></li>
                <li><a href="https://jsfiddle.net/user/areisle/fiddles/"><div class=" icon jsfiddle" aria-hidden="true"></div><span>JSFiddle </span></a></li>
                <li><a href="http://codepen.io/areisle/"><div class=" icon codepen" aria-hidden="true"></div><span>Codepen </span></a></li>
            </ul>
        </nav>
        <div></div>
        </section>
        <section class="contact-form">
            <?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
        </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

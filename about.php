<?php
/**
 * Template Name: About
 *
 * @package Unnavigated
 */

get_header(); ?>
<main>
    <section class="post-header">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br>
                <h1 class="header center white-text text-lighten-2"><?php the_title();?></h1>
                <br><br>

            </div>
        </div>
        <div class="page-container-overlay">&nbsp;</div>
        <?php  if ( has_post_thumbnail() ) {
            the_post_thumbnail();
        } else { ?>
            <img src="<?php bloginfo('template_directory'); ?>/wp-content/uploads/2017/06/unnavigated-coast.jpg" alt="<?php the_title(); ?>" class="responsive-img" />
        <?php } ?>
    </section>

<?php while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

<?php
get_footer();

<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Unnavigated
 */

get_header(); ?>
 <section class="post-header">
                    <div class="section no-pad-bot">
                        <div class="container">
                            <br><br>
                            <h1 class="header center white-text text-lighten-2"><?php /* translators: %s: search query. */
printf( esc_html__( 'Search Results for: %s', 'unnavigated' ), '<span>' . get_search_query() . '</span>' );
?></h1><div class="search"><?php get_search_form();?></div>
                            <br><br>
                        </div>
                    </div>
                    <div class="page-container-overlay">&nbsp;</div>
                    <?php  if ( has_post_thumbnail() ) {
    the_post_thumbnail();
} else { ?>
    <img src="https://www.unnavigated.com/wp-content/uploads/2017/06/unnavigated-coast.jpg" alt="<?php the_title(); ?>" class="responsive-img" />
<?php } ?>
</section>



        <div class="search-container">

                    <?php if ( have_posts() ) : ?>



                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <span class="search-post-title"><?php the_title(); ?></span>
                            <span class="search-post-excerpt"><?php the_excerpt(); ?></span>
                            <span class="search-post-link"><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></span>

                        <?php endwhile; ?>

                        <?php //the_posts_navigation(); ?>

                    <?php else : ?>

                        <?php //get_template_part( 'template-parts/content', 'none' ); ?>

                    <?php endif; ?>

        </div>



<?php get_footer();



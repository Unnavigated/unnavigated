<?php
/**
 * Template Name: destinations
 *
 * @package Unnavigated
 */

get_header(); ?>

            <main>
                <section class="page-header">
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
                        <img src="https://www.unnavigated.com/wp-content/uploads/2017/06/unnavigated-coast.jpg" alt="<?php the_title(); ?>" class="responsive-img" />
                    <?php } ?>
                </section>

    <?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => 1,
    'post_parent'    => $post->ID,
    'order'          => 'DESC',
    'offset'         => 0,
    'orderby'        => 'date'
);

$args2 = array(
    'post_type'      => 'page',
    'posts_per_page' => 2,
    'post_parent'    => $post->ID,
    'order'          => 'DESC',
    'offset'         => 1,
    'orderby'        => 'date'
);

$args3 = array(
    'post_type'      => 'page',
    'posts_per_page' => 2,
    'post_parent'    => $post->ID,
    'order'          => 'DESC',
    'offset'         => 3,
    'orderby'        => 'date'
);

?><div class="destinations-main wrapper cf">
        
                    <div class="row">

                        <?php $query = new WP_query ( $args );
                        if ( $query->have_posts() ) { ?>

                        <div id="sidebar" class="col l6 m12 s12 sidebar">
                            <div class="col s12">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <?php if ( has_post_thumbnail() ) { ?>

                                    <?php
                                    $post_image_id = get_post_thumbnail_id($post_to_use->ID, '_wp_attachment_image_alt', true);
                                    if ($post_image_id) {
                                        $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
                                        if ($thumbnail) (string)$thumbnail = $thumbnail[0];
                                    }
                                    ?>

                                    <article id="post-<?php the_ID(); ?>" class="destinations-first waves-light destinations-tile clearfix">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>" />
                                        <section>
                                            <h3><?php the_title(); ?></h3>
                                            <p><?php the_excerpt(); ?></p>
                                        </section>
                                        </a>
                                    </article>
                                <?php }?>
                            <?php endwhile; ?>


                                <?php wp_reset_postdata(); ?>
                            </div>

                        </div>

                        <?php } ?>


                        <div class="col l6 m12 s12">
                            <?php $query = new WP_query ( $args2 );
                            if ( $query->have_posts() ) { ?>
                            <div class="col l6 m12 s12">



                                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                        <?php if ( has_post_thumbnail() ) { ?>

                                            <?php
                                            $post_image_id = get_post_thumbnail_id($post_to_use->ID, '_wp_attachment_image_alt', true);
                                            if ($post_image_id) {
                                                $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
                                                if ($thumbnail) (string)$thumbnail = $thumbnail[0];
                                            }
                                            ?>

                                            <article id="post-<?php the_ID(); ?>" class="destinations-tile">
                                                <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>" />

                                                <section>
                                                <h3><?php the_title(); ?></h3>
                                                <p><?php the_excerpt(); ?></p>
                                                </section>
                                                </a>
                                            </article>
                                        <?php }?>
                                    <?php endwhile; ?>


                                    <?php wp_reset_postdata(); ?>




                            </div>
                            <?php } ?>
                            <?php $query = new WP_query ( $args3 );
                            if ( $query->have_posts() ) { ?>
                            <div class="col l6 m12 s12">


                                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                            <?php if ( has_post_thumbnail() ) { ?>

                                                <?php
                                                $post_image_id = get_post_thumbnail_id($post_to_use->ID, '_wp_attachment_image_alt', true);
                                                if ($post_image_id) {
                                                    $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
                                                    if ($thumbnail) (string)$thumbnail = $thumbnail[0];
                                                }
                                                ?>

                                                <article id="post-<?php the_ID(); ?>" class="destinations-tile">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>" />

                                                    <section>
                                                        <h3><?php the_title(); ?></h3>
                                                        <p> <?php the_excerpt(); ?></p>
                                                    </section>
                                                    </a>
                                                </article>
                                            <?php }?>
                                        <?php endwhile; ?>


                                        <?php wp_reset_postdata(); ?>

                            </div>
                            <?php } ?>

                        <div class="col l12"><a class="waves-effect waves-light btn-large destinations-button" href="https://www.unnavigated.com/backpacking-blog/">See all travel guides</a></div>

                    </div>
                    </div>
                </div>



<?php
get_footer();

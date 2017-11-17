<?php
/**
 * Template Name: blog
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

    <div id="blog-overview">
    <!-- Filter Controls - Simple Mode -->
    <form class="row">
        <!-- A basic setup of simple mode filter controls, all you have to do is use data-filter="all"
        for an unfiltered gallery and then the values of your categories to filter between them -->
        <div class="col m4 search-row">
            <!-- Dropdown Trigger
            <a class='dropdown-button btn' href='#' data-activates='dropdown1'>What Destination?</a>-->

            <!-- Dropdown Structure -->
            <?php $tags = get_tags();
            $html = '<ul id="dropdown1" class="dropdown-content">';
            $html .= '<li data-filter="all">All</li>';

            foreach ( $tags as $tag ) {
                $tag_link = get_tag_link( $tag->term_id );

                $html .= "<li data-filter='1' value='{$tag->name}' title='{$tag->name}' class='{$tag->slug}'>";
                $html .= "{$tag->name}</li>";
            }
            $html .= '</ul>';
            echo $html;?>
        </div>
        <!-- Search control -->
        <div class="wide-container">
        <div class="col m12 search-row">
            <p>What do you want to find?</p>
            <input type="text" class="filtr-search" name="filtr-search"  data-search>
        </div>
        </div>
    </form>

    <div class="wrapper blogitems">
        <div class="row">
            <div class="filtr-container">
                <?php query_posts('showposts=50'); if (have_posts()) : while (have_posts()) : the_post();?>
                    <div class="col xl3 l4 m6 s12 filtr-item" data-category="1" data-sort="<?php post_class(); ?>">
                        <figure id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <a href="<?php the_permalink(); ?>" class="blogitem">


                                <?php
                                $post_image_id = get_post_thumbnail_id($post_to_use->ID, '_wp_attachment_image_alt', true);
                                if ($post_image_id) {
                                    $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
                                    if ($thumbnail) (string)$thumbnail = $thumbnail[0];
                                }
                                ?>

                                <img class="responsive-img" src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>">
                                <figcaption>
                                    <section><p><?php the_date();?></p><h3><?php the_title(); ?></h3></section>
                                    <div class="blog-grid-overlay2">&nbsp;</div>
                                    <div class="blog-grid-overlay1">&nbsp;</div>
                                </figcaption>
                            </a>
                        </figure>

                    </div>

                <?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
                <?php endif; wp_reset_query();/* rewind or continue if all posts have been fetched */?>

            </div>
        </div>
        <div class="row">
            <div class="col l12">
                <?php
                global $wp_query; // you can remove this line if everything works for you

                // don't display the button if there are not enough posts
                if (  $wp_query->max_num_pages > 1 )
                    echo '<a class="waves-effect waves-light btn-large destinations-button misha_loadmore" href="#">Load more</a>'; // you can use <a> as well
                ?>
                </div>
        </div>
    </div>

<?php
get_footer();

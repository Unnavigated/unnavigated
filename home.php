<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Unnavigated
 */

get_header(); ?>

    <main>
        <section class="video-container">
            <div class="section no-pad-bot">
                <div class="container">
                    <br><br>
                    <h1 class="header center white-text text-lighten-2"><span class="typewrite" data-period="2000" data-type='[ "Hi, welcome to this travel blog!", "Want to go backpacking around the world?", "Where do you want to go next?", "Take a look at my travel guides!" ]'></span></h1>
                    <br><br>

                </div>
            </div>
            <div class="video-container-overlay">&nbsp;</div>
            <video autoplay loop playsinline class="fillWidth" poster="https://www.unnavigated.com/wp-content/uploads/2017/06/unnavigated-coast.jpg" >
                <source src="https://www.unnavigated.com/wp-content/uploads/2017/06/unnavigated-train-view.webm" type="video/webm"></source>
                <source src="https://www.unnavigated.com/wp-content/uploads/2017/06/unnavigated-train-view.mp4" type="video/mp4"></source>
                <source src="https://www.unnavigated.com/wp-content/uploads/2017/06/unnavigated-train-view-2.ogg" type="video/ogv"></source>
            </video>
        </section>

        <div class="wide-container">
            <div id="index-intro" class="section">
                <div class="row">
                    <div class="col s12 left-align">
                        <h2 class="left-align">GET INSPIRED ABOUT TRAVEL</h2>
                        <p class="left-align light">Unnavigated brings you useful travel guides, in-depth backpacking advice, nurtured travel photography and aims to consult, inspire & motivate independent travellers like yourself to travel the world. On this website you will find honest articles, step-by-step itineraries and destination guides with unique travel pictures for backpackers and any other travelers.</p>
                        <a href="https://www.unnavigated.com/about/" class="waves-effect waves-light btn-large">MORE ABOUT UNNAVIGATED</a><a class="waves-effect waves-light btn-large" href="https://www.unnavigated.com/backpacking-guides/">TRAVEL DESTINATIONS</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
        <div class="blogitems-header wide-container">
            <h3 class="left-align">WHAT'S NEW?</h3>
        </div>

        <div class="wrapper blogitems">
            <div class="row">
                <div class="filtr-container">
                    <?php query_posts('showposts=7'); if (have_posts()) : while (have_posts()) : the_post();?>
                    <div class="col xl3 l4 m6 s12 filtr-item" data-category="1, 5" data-sort="Blogpost">
                            <figure id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <a href="<?php the_permalink(); ?>" class="blogitem">

                                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

                                    <img class="responsive-img" src="<?php echo $backgroundImg[0]; ?>" alt="<?php the_title(); ?>">
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





                    <div class="col xl3 l4 m6 s12 filtr-item indexblog-button" data-category="1, 5" data-sort="Busy streets">

                        <a class="waves-effect waves-light btn-large" href="https://www.unnavigated.com/backpacking-blog/">Go to the blog</a>
                    </div>
                </div>
            </div>
        </div>
        </div>

<div class="wrapper">

        <div class="wide-container">
            <div id="index-bottom" class="section">
                <div class="row">
                    <section class="col m12 frontpage-block">
                        <header class="text-left">
                            <h3>ABOUT THE AUTHOR</h3>
                        </header>
                        <p> Hi! My name is Matthias Mandiau. I'm a travel-minded writer & entrepreneur and I want to help you out regarding all kinds of <a href="https://www.unnavigated.com/backpacking-guides/">travel destinations around the world.</a> The travel guides on this website are written in such way to help you improve the quality of your journeys around the world. Every article is based on my own thoughts and experiences.</p>
                        <p><a class="floatleft morepost2" href="https://www.unnavigated.com/about/">Read More</a></p>
                    </section>


                </div>


            </div>
            <!-- <div class="row" style="margin: 9rem 0;" >
                <div class="col l5 m6 s12 floatleft left-align">
                    <p><b>Keep in Touch with Unnavigated.</b></p>
                </div>
                <div class="col l7 m6 s12 floatleft left-align">





                    <div id="mc_embed_signup">
                        <form action="https://unnavigated.us16.list-manage.com/subscribe/post?u=3644c020113ffe5751dcdcaa4&amp;id=002f603f49" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                                <div class="mc-field-group">
                                    <input class="newsletter-signup__input js-newsletter-signup__input" type="email" type="email" value="" name="EMAIL"  id="mce-EMAIL" placeholder="Enter Your Email">

                                </div>
                                <div id="mce-responses" class="clear">
                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_3644c020113ffe5751dcdcaa4_002f603f49" tabindex="-1" value=""></div>
                            </div>
                        </form>
                    </div>

                   End mc_embed_signup -->


                </div>
            </div>
        </div>

</div>

        <div class="row">

            <div class="instapart" id="instafeed">

            </div>


        </div>







        <!-- <div class="parallax-container valign-wrapper">
             <div class="parallax"><img src="https://www.unnavigated.com/wp-content/uploads/2017/01/Unnavigated-Matthias-Mandiau-South-Africa-2013.jpg" alt="Unsplashed background img 3"></div>
         </div>-->



<?php get_footer();

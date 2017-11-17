<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Unnavigated
 */
get_header(); ?>
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
            <img src="https://www.unnavigated.com/wp-content/uploads/2017/06/unnavigated-coast.jpg" alt="<?php the_title(); ?>" class="responsive-img" />
        <?php } ?>
    </section>

    <div class="container">
        <div class="pagecontent">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div></div>
<?php
get_footer();

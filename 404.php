<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Unnavigated
 */

get_header(); ?>

	<main id="main-404-content" class="main-content-static">

   	<div class="content-wrap">

		   <div class="shadow-overlay"></div>

		   <div class="main-content container">
		   	<div class="row">
		   		<div class="col s12">

			  			<h1 class="kern-this">404 Error</h1>
			  			<p>
						Oooooops! Looks like nothing was found at this location.
						Maybe try a search?
			  			</p>

			  			<div class="search">
				      	<?php get_search_form();?>
				      </div>

			   	</div> <!-- /twelve -->
		   	</div> <!-- /row -->
		   </div> <!-- /main-content -->


		</div> <!-- /content-wrap -->

   </main> <!-- /main-404-content -->

   <div id="preloader">
    	<div id="loader"></div>
   </div>



<?php
get_footer();

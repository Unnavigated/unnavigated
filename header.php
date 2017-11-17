<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Unnavigated
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<header>
<nav class="transparant z-depth-0 transparantnav" role="navigation">
    <div class="nav-wrapper">
        <div class="row">
            <div class="col s12">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="show-on-large hide-on-small brand-logo">Unnavigated</a>
              <span id="nav-trig" class="hide-on-large-only show-on-small open-menu"><i class="floatright" id="nav-icon1">
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                  </i></span>

                <?php
                wp_nav_menu( array(
                    'menu' => 'primary',
                    'menu_class'     => 'right hide-on-med-and-down'
                ) );
                ?>


            </div>
        </div>
    </div>
</nav>

<!-- Overlay Navigation Menu -->
<div class="overlay">
    <div class="nav overlay-menu">
        <?php
        wp_nav_menu( array(
            'menu' => 'secondary'
        ) );
        ?>
    </div>
</div>

</header>


		</div>

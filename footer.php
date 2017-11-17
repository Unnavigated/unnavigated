<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Unnavigated
 */

?>

	</main>

<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l5 m12 s12 page-footer-nav">
                <section class="page-footer-section">
                    <h2 class="white-text line-1 anim-typewriter">UNNAVIGATED.</h2>
                </section>
            </div>

            <div class="col l4 m6 s12 page-footer-nav">
                <section class="page-footer-section">
                    <h3>EMAIL</h3>
                    <a class="white-text" href="mailto:info@unnavigated.com">info@unnavigated.com</a></p>
                </section>
                <section class="page-footer-section">
                    <h3>SOCIAL</h3>
                    <ul>
                        <li><a class="white-text" href="#!">Instagram</a></li>
                        <li><a class="white-text" href="#!">Facebook</a></li>
                        <li><a class="white-text" href="#!">Twitter</a></li>
                        <li><a class="white-text" href="#!">Pinterest</a></li>
                    </ul>
                </section>
            </div>
            <div class="col l3 m6 s12 page-footer-nav">
                <section class="page-footer-section">
                    <h3>LOOK AROUND</h3>
                    <?php
                    wp_nav_menu( array(
                        'menu' => 'footer'
                    ) );
                    ?>
                </section>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>

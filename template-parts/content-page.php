<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package customtheme
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="customtheme-share-container">
        <div class="container">
            <div class="customtheme-share-content">
                <h1 class="customtheme-share-heading"><?php echo get_the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
            <button class="click-btn">Click Here</button>
        </div>
        </div>
    </section>
</article><!-- #post-<?php the_ID(); ?> -->

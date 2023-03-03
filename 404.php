<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package custom-theme
 */
get_header();
?>
<section class="detail-screen-container">
   <div class="company-description-block">
        <div class="container">
              <div class="unlisted-share-content">
                   <div class=" page-header not-found">
                        <h1 class="page-title"><?php esc_html_e('Oops! Page not found.', 'mission-theme'); ?></h1>
                        <h3 class="not-found-text">We’re sorry this page does not exist. <br/>Try the links above to start your experience again.</h3>
                    </div>
                    <div class="error-404"><img src="<?php echo get_template_directory_uri(); ?>/images/404.jpg" alt="Page not Found"/></div>
               </div>
         </div>
    </div>
</section>
<?php
get_footer();

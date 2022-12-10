<?php
/**
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package customtheme
 */

get_header();
?>
  <section class="detail-screen-container">
      <div class="company-detail-header">
        <div class="container">
          <div class="company-detail-row">
          <?php 
           if(get_field('detail_page_transparent_logo')){
                $trasparent_image = get_field('detail_page_transparent_logo');
                echo  '<div class="company-detail-logo">
                    <img src="'.$trasparent_image['url'].'" alt="detail-com-logo" />
                </div>';
            }
            if (get_field('share_price')){ ?>
                <div class="company-detail-price">
                    <div class="company-column-heading">';
                        <?php echo (get_field("pricing_heading", "options")) ?  get_field("pricing_heading", "options") : "Price";?>
                    </div>';
                    <div class="company-column-desc"><?php echo get_field('share_price')?> </div>
                </div>
           <?php }
            if(get_field('lot_size_share')):?>
            <div class="company-derail-size">
                <div class="company-column-heading">
                    <?php echo (get_field('lot_size_heading', 'options')) ?  get_field('lot_size_heading', 'options') : "Lot Size";?>
                </div>
            <div class="company-column-desc"><?php echo get_field('lot_size_share') ?></div>
            </div>
           <?php endif; ?>
            <div class="company-detail-btn">
                <a href="#buy-sell-modal" rel="modal:open"><?php echo  get_field('buy_now_button_heading', 'options') ?  get_field('buy_now_button_heading', 'options') : "Buy Now"; ?> </a>
            </div>
          </div>
        </div>
      </div>
      <div id="buy-sell-modal" class="modal">
        <div class="modal-header">
            <div class="modal-heading">Buy or Sell</div>
            <a href="#" rel="modal:close">
              <img src="<?php bloginfo('template_url')?>/images/close-btn.svg" alt="close"/>
            </a>
        </div>
        <div class="modal-body">
            <?php echo do_shortcode('[contact-form-7 id="'.get_field('contact_form').'"]'); ?> 
        </div>
      </div>
      <div class="company-description-block">
        <div class="container">
          <div class="company-desc-main">
            <nav class="detail-nav">
              <ul>
                <?php if(get_field('customtheme_share_detail_page_content')){
                    $sharedetails_tabs = get_field('customtheme_share_detail_page_content');
                    $counter = 1;
                    foreach ($sharedetails_tabs as $sharedetails_tab) {
                        $active =   ($counter === 1) ? 'active' : '';
                        echo '<li class="'.$active.'">
                            <a href="#sec-'.$counter.'-'.$sharedetails_tab['right_side_tab_title'].'">'.$sharedetails_tab['right_side_tab_title'].'</a>
                        </li>';
                        $counter++;
                    } 
                } ?>
              </ul>
            </nav>
            <main class="detail-desc">
            <?php if(get_the_post_thumbnail_url()){ 
             echo '<section class="company-desc-logo">
               <img src="'.get_the_post_thumbnail_url().'" alt="company logo">
              </section>'; 
            } ?>


              <!-- *********************** -->
               <?php
               if( have_rows('customtheme_share_detail_page_content') ):
                $i=1;
               while( have_rows('customtheme_share_detail_page_content') ): the_row();
               $right_side_tab_title =  get_sub_field('right_side_tab_title');
                ?>

             
              <section id="sec-<?php echo $i."-".$right_side_tab_title; ?>">
              
                <?php if ( have_rows( 'tab_detail_content' ) ) {
                   while ( has_sub_field( 'tab_detail_content' ) ) {
                    if(get_row_layout() == 'plain_content'){
                        echo get_sub_field('description');
                    }
                   if(get_row_layout() == 'pdf_section'){
                        echo get_sub_field('heading_of_pdf_section');
                        echo '<div class="ann-report-row">';
                        if(get_sub_field('upload_share_detail_pdf')){
                          $pdf_files= get_sub_field('upload_share_detail_pdf');
                          foreach ($pdf_files  as $pdf_file) {
                          echo '<div class="ann-report-column">
                                <a href="'.$pdf_file['pdf_file']['link'].'">
                                <img src="'. get_template_directory_uri() .'/images/files-icon-pdf.svg" alt="pdf file" />
                                <p>' . $pdf_file['pdf_file']['filename'] .' </p>
                                    </a>
                                </div>';
                            }
                 }
               echo '</div>';
                    }
                   }
               } ?>
              </section>
          <?php $i++; endwhile; endif; ?>
            </main>
          </div>
        </div>
      </div>
  </section>
<?php
get_footer();
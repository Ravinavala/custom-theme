<?php
/* Template Name: Home page */
get_header();
?>
    <!-- ************ Banner start ************* -->
    <div class="banner">
        <div class="container">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
            endwhile; endif;

            //banner slider
            $slider_args  = array(
                'post_type'  => 'shares_list',
                'orderby'    => 'date',
                'order'      => 'DESC',
                'meta_query' => array(
                    array(
                        'key'     => 'featured_company_shares',
                        'value'   => 'true',
                        'compare' => 'LIKE',
                    ),
                ),
            );
            $slider_query = new WP_Query( $slider_args );

            echo '<div class="banner-slider">
			        <div class="owl-carousel owl-theme" id="bannerslider">';
            if ( $slider_query->have_posts() ):
                while ( $slider_query->have_posts() ) : $slider_query->the_post();
                    $company_ID        = get_the_ID();
                    $share_holder_logo = get_field( 'logo_of_shareholder', $company_ID );
                    echo '<div class="item" >
					      <div class="item-top" >
						  <div class="item-top-obverlay" ></div >
						  <div class="item-inv-logo" >
							 <img src = "' . get_the_post_thumbnail_url( $company_ID ) . '" alt = "investor logo" />
						  </div >
						  <div class="item-inv-ico" >
							<img src = "' . $share_holder_logo['url'] . '" alt = "investor logo ico" />
						  </div>
				          </div >';
                    echo '<div class="item-middle" >';
                    if ( get_field( 'lot_size_share', $company_ID ) ):
                        echo '<div class="item-middle-left" >
						 	 <div class="item-middle-heading" >';
                                echo get_field('lot_size_heading', 'options') ?  get_field('lot_size_heading', 'options') : "Lot Size";
                        echo '</div >
							 <div class="item-middle-label" > ' . get_field( 'lot_size_share', $company_ID ) . ' </div >
					 	 </div >';
                    endif;
                    if ( get_field( 'share_price', $company_ID ) ):
                        echo '<div class="item-middle-right" >
					 		 <div class="item-middle-heading" >';
                                 echo get_field('pricing_heading', 'options') ?  get_field('pricing_heading', 'options') : "Price";
                        echo '</div>
						 	 <div class="item-middle-label" > ₹ ' . get_field( 'share_price', $company_ID ) . ' </div >
						 </div >';
                    endif;
                    echo '</div>';

                    echo '<div class="item-bottom" >
					 	    <a href = "' . get_permalink( $company_ID ) . '" > View Details </a >';
					      echo '<button>';
                          echo get_field('buy_now_button_heading', 'options') ?  get_field('buy_now_button_heading', 'options') : "Buy Now";
                          echo '</button >';
					echo  '</div >';
                    echo '</div >';
                endwhile; endif;
            wp_reset_postdata();
            echo '</div>
		      </div>';
            ?>
        </div>
    </div>
    <!-- ************ Section 1 start ************* -->
<?php if ( get_field( 'after_banner_unlisted_share_section_sub_heading' ) || get_field( 'unlisted_share_section_title' ) ) : ?>
    <section class="section-1">
        <div class="container">
            <div class="section-header">
                <div class="section-heading"><?php echo get_field( 'unlisted_share_section_title' ); ?></div>
                <div class="section-sub-heading">
                    <?php echo get_field( 'after_banner_unlisted_share_section_sub_heading' ); ?>
                </div>
            </div>
            <div class="share-list-block">
                <div class="share-list-header">
                    <div class="share-list-left">
                        <h6><?php echo get_field( 'share_listing_heading' ); ?></h6>
                    </div>
                    <div class="share-list-right">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"/>
                    </div>
                </div>
                <div class="responsive-table">
                    <table id="myTable">
                        <tr class="header">
                            <th>Company Name</th>
                            <th><?php  echo (get_field("pricing_heading", "options")) ?  get_field("pricing_heading", "options") : "Price"; ?> </th>
                            <th><?php echo (get_field('lot_size_heading', 'options')) ?  get_field('lot_size_heading', 'options') : "Lot Size"; ?></th>
                            <th></th>
                        </tr>
                        <?php
                        $args = array(
                            'post_type'      => 'shares_list',
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'posts_per_page' => 12,
                        );

                        $sharelist_query = new WP_Query( $args );
                        while ( $sharelist_query->have_posts() ) : $sharelist_query->the_post();
                            $logo_of_shareholder = get_field( 'logo_of_shareholder' );
                            ?>
                            <tr>
                                <td>
                                    <div class="company-name-block">
                                        <div class="comp-logo-block"><img src="<?php echo $logo_of_shareholder['url']; ?>" alt=""/></div>
                                        <?php echo get_the_title(); ?>
                                    </div>
                                </td>
                                <td><?php echo get_field( 'lot_size_share' ); ?></td>
                                <td><?php echo get_field( 'share_price' ); ?></td>
                                <td>
                                    <a href="<?php echo get_permalink(); ?>"
                                    <button class="detail-btn">View Details</button>
                                    </a>
                                    <button class="buy-btn"><?php echo  get_field('buy_now_button_heading', 'options') ?  get_field('buy_now_button_heading', 'options') : "Buy Now"; ?></button>
                                </td>
                            </tr>
                        <?php endwhile;
                        wp_reset_postdata(); ?>

                    </table>
                </div>
            </div>
            <div class="unlisted-com-btn">
                <a href="<?php echo get_permalink( 13 ); ?>">
                    <button>See all unlisted companies</button>
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>
    <!-- ************ Section 2 start ************* -->
<?php if ( get_field( 'overview_of_share_company' ) || get_field( 'left_side_content_of_unlisted_shares' ) ) : ?>
    <section class="section-2">
        <div class="container">
            <div class="listed-share-block">
                <?php if ( get_field( 'overview_of_share_company' ) ) :
                    $overview_of_share_company = get_field( 'overview_of_share_company' );

                    echo '<div class="listed-share-left">';
                    echo '<div class="listed-share-overview">';
                    $list = 1;
                    foreach ( $overview_of_share_company as $overview_of_share ):
                        if ( $list == 1 || $list == 2 ):
                            $class = 'paddingb-40';
                        else:
                            $class = '';
                        endif;

                        echo '<div class="listed-share-over-content ' . $class . ' " >
						<img src ="' . $overview_of_share['list_icon']['url'] . '" alt = "available Company" />
						<h6>' . $overview_of_share['no_of_customerinvestors'] . '</h6 >
						<p> ' . $overview_of_share['heading_of_share_overview'] . '</p >
				      </div >';
                        $list ++;
                    endforeach;
                    echo '</div>';
                    echo '</div>';
                endif;
                if ( get_field( 'left_side_content_of_unlisted_shares' ) ):
                    echo '<div class="listed-share-right">
				  <div class="section-heading">' . get_field( 'left_side_heading_of_unlisted_shares' ) . '</div>';

                    echo '<div class="section-sub-heading">
				      ' . get_field( 'left_side_content_of_unlisted_shares' ) . '
			        </div>';

                    echo '</div>';
                endif;
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
    <!-- ************ Section 3 start ************* -->
<?php if ( get_field( 'heading_of_why_unlisted_deals' ) || get_field( 'detail_info_why_unlisted_deals' ) ) { ?>
    <section class="section-3">
        <div class="container">
            <div class="section-header">
                <div class="section-heading"><?php echo get_field( 'heading_of_why_unlisted_deals' ); ?></div>
                <?php if ( get_field( 'sub_heading_of_why_unlisted_deals' ) ):
                    echo '<div class="section-sub-heading">';
                    echo get_field( 'sub_heading_of_why_unlisted_deals' );
                    echo '</div>';
                endif; ?>
            </div>

            <?php if ( get_field( 'detail_info_why_unlisted_deals' ) ) {
                $detail_info_why_unlisted_deals = get_field( 'detail_info_why_unlisted_deals' );
                $count                          = 1;
                echo '<div class="unlisted-deal-reason-block">';
                foreach ( $detail_info_why_unlisted_deals as $detail_info_why_unlisted_deal ) {
                    if ( $count % 3 == 1 ) {
                        echo '<div class="unlisted-deal-reason-block">';
                    }
                    echo '<div class="unlisted-reason-container">';

                    echo '<div class="unlisted-reason-block">';
                    if ( $detail_info_why_unlisted_deal['image'] ) {
                        echo '<div class="unlisted-reason-img" >
						     <img src ="' . $detail_info_why_unlisted_deal['image']['url'] . '" alt = "unlisted reason img" class="" />
					       </div>';
                    }
                    echo '<div class="unlisted-reason-desc">
					    	 <h6>' . $detail_info_why_unlisted_deal['heading'] . '</h6>
					 	     <p>' . $detail_info_why_unlisted_deal['sub_heading'] . '</p>
				 	       </div>';
                    echo '</div>';
                    echo '</div>';
                    $count ++;
                    if ( $count % 3 == 1 ) {
                        echo '</div>';
                    }
                }
            }
            echo '</div>';
            ?>

        </div>
    </section>
<?php } ?>
    <!-- ************ Section 4 start ************* -->
    <section class="section-4">
        <div class="container">
            <div class="section-header">
                <div class="section-heading">Popular post</div>
                <div class="section-sub-heading">
                    Lorem ipsum, or lipsum as it is sometimes known, is dummy text used
                    in laying out print, graphic or web designs.
                </div>
            </div>
            <div class="popular-post-block">
                <div class="popular-post-row">
                    <div class="popular-post-column">
                        <div class="popular-post-container">
                            <div class="popular-post-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/post-img-1.png" alt="post 1"/>
                            </div>
                            <div class="popular-post-desc">
                                <a href="#">
                                    <h6>Everything You Need to Know About Associate Company</h6>
                                    <p>May 13, 2019</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="popular-post-column">
                        <div class="popular-post-container">
                            <div class="popular-post-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/post-img-2.png" alt="post 1"/>
                            </div>
                            <div class="popular-post-desc">
                                <a href="#">
                                    <h6>
                                        Difference between Offer For Sale, Qualified Institutional
                                        Placement…
                                    </h6>
                                    <p>May 13, 2019</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="popular-post-column">
                        <div class="popular-post-container">
                            <div class="popular-post-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/post-img-3.png" alt="post 1"/>
                            </div>
                            <div class="popular-post-desc">
                                <a href="#">
                                    <h6>
                                        10 mistakes people make while investing in mutual funds
                                    </h6>
                                    <p>May 13, 2019</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popular-post-row">
                    <div class="popular-post-column">
                        <div class="popular-post-container">
                            <div class="popular-post-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/post-img-1.png" alt="post 1"/>
                            </div>
                            <div class="popular-post-desc">
                                <a href="#">
                                    <h6>Everything You Need to Know About Associate Company</h6>
                                    <p>May 13, 2019</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="popular-post-column">
                        <div class="popular-post-container">
                            <div class="popular-post-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/post-img-2.png" alt="post 1"/>
                            </div>
                            <div class="popular-post-desc">
                                <a href="#">
                                    <h6>
                                        Difference between Offer For Sale, Qualified Institutional
                                        Placement…
                                    </h6>
                                    <p>May 13, 2019</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="popular-post-column">
                        <div class="popular-post-container">
                            <div class="popular-post-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/post-img-3.png" alt="post 1"/>
                            </div>
                            <div class="popular-post-desc">
                                <a href="#">
                                    <h6>
                                        10 mistakes people make while investing in mutual funds
                                    </h6>
                                    <p>May 13, 2019</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ************ Section 5 start ************* -->
<?php if ( get_field( 'heading_of_our_client_section' ) || get_field( 'client_testimony_and_details' ) ) { ?>
    <section class="section-5">
        <div class="container">
            <div class="section-header">
                <div class="section-heading">In Our Client Words</div>
                <?php if ( get_field( 'sub_heading_of_our_client_section' ) ) : ?>
                    <div class="section-sub-heading">
                        <?php echo get_field( 'sub_heading_of_our_client_section' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ( get_field( 'client_testimony_and_details' ) ) {
                $client_testimony_detials = get_field( 'client_testimony_and_details' );
                ?>
                <div class="section_slider popular-post-block">
                    <div class="slider_inner">
                        <div class="client_slider">
                            <div class="owl-carousel owl-theme" id="testimonialslider">
                                <?php foreach ( $client_testimony_detials as $client_testimony_detial ) { ?>
                                    <div class="item">
                                        <?php if ( $client_testimony_detial['client_image']['url'] ): ?>
                                            <div class="item_top">
                                                <div class="item_clientpic">
                                                    <img src="<?php echo $client_testimony_detial['client_image']['url']; ?>" alt="client picture"/>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="item_middle">
                                            <p class="testimonial">
                                                <?php echo $client_testimony_detial['client_testimony']; ?>
                                            </p>
                                        </div>
                                        <div class="item_bottom">
                                            <div class="client_name">
                                                <?php echo $client_testimony_detial['client_name']; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>
<?php get_footer(); ?>
<?php
/* Template Name: customtheme share page */
get_header();
?>
    <section class="section-1 customtheme-section-1">
        <div class="container">
            <div class="share-list-block">
                <div class="share-list-header">
                    <div class="share-list-left">
                        <h6><?php echo get_the_title(); ?></h6>
                    </div>
                    <div class="share-list-right">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"/>
                    </div>
                </div>
                <div class="responsive-table">
                    <table id="myTable">
                        <tr class="header">
                            <th>Company Name</th>
                            <th><?php  echo (get_field("pricing_heading", "options")) ?  get_field("pricing_heading", "options") : "Price"; ?></th>
                            <th><?php echo (get_field('lot_size_heading', 'options')) ?  get_field('lot_size_heading', 'options') : "Lot Size"; ?></th>
                            <th></th>
                        </tr>
                        <?php
                        $args = array(
                            'post_type'      => 'shares_list',
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'posts_per_page' => - 1,
                        );

                        $sharelist_query = new WP_Query( $args );
                        if ( $sharelist_query->have_posts() ):
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
                            <?php endwhile; endif;
                        wp_reset_postdata(); ?>

                    </table>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
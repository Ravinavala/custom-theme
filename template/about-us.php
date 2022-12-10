<?php
/* Template Name: About us template */
get_header();
?>
<!-- ************ Section 1 start ************* -->
<section class="detail-screen-container">
    <div class="company-description-block">
        <div class="container">
            <div class="company-desc-main">
                <nav class="detail-nav">
                    <ul>
                        <?php
                        if ( have_rows( 'about_us_tab_and_content' ) ):
                            $count = 1;
                            while ( have_rows( 'about_us_tab_and_content' ) ) : the_row();
                                if ( get_row_layout() == 'add_new_tab_and_content' ):
                                    $class = ( $count == 1 ) ? 'active' : '';
                                    echo '<li class="' . $class . '">
							        <a href="#sec-' . $count . 'tab">' . get_sub_field( 'add_new_tab_heading' ) . '</a>
							  </li>';
                                    $count ++;
                                endif; endwhile; endif; ?>
                    </ul>
                </nav>
                <main class="detail-desc">
                    <?php
                    if ( have_rows( 'about_us_tab_and_content' ) ):
                        $counter = 1;
                        while ( have_rows( 'about_us_tab_and_content' ) ) : the_row();
                            if ( get_row_layout() == 'add_new_tab_and_content' ): ?>

                                <section id="sec-<?php echo $counter; ?>tab">
                                    <div class="detail-com-heading">
                                        <?php echo get_sub_field( 'add_new_tab_heading' ); ?>
                                    </div>
                                    <div class="marginb-16"></div>
                                    <div class="detail-com-desc">
                                        <?php echo get_sub_field( 'tab_content_' ); ?>
                                    </div>
                                    <div class="marginb-30"></div>

                                    <?php if ( have_rows( 'content_base_on_requirement' ) ) {
                                        while ( has_sub_field( 'content_base_on_requirement' ) ) { ?>

                                            <?php if ( get_row_layout() == 'why_trade_with_us' ) {
                                                $display_from_home = get_sub_field( 'display_from_home_page' );


                                                $why_trade_repeater = get_sub_field( 'analyze_why_trade_with_us' );


                                                echo '<div class="why-trade-row">';
                                                if ( ! empty( $why_trade_repeater ) ) {
                                                    foreach ( $why_trade_repeater as $whycustomtheme_share ) {

                                                        echo '<div class="why-trade-column">';
                                                        echo '<div class="why-trade-img">
								 	                         <img src="' . $whycustomtheme_share['image']['url'] . '" alt="trade img"/>
								                        </div>';
                                                        echo '<div class="why-trade-content">
									                       <h6>' . $whycustomtheme_share['heading'] . '</h6>
								      	                   <p> ' . $whycustomtheme_share['sub_heading'] . ' </p>
								                       </div>';

                                                        echo '</div>';
                                                    }
                                                }
                                                echo '</div>';
                                            } ?>

                                            <?php if ( get_row_layout() == 'who_we_are_people_info' ) { ?>
                                                <div class="founder-desc-row">
                                                    <!-- ------------- -->
                                                    <?php if ( get_sub_field( 'who_we_are_people_images' ) ) {
                                                        $who_we_are_people_images = get_sub_field( 'who_we_are_people_images' );
                                                        foreach ( $who_we_are_people_images as $who_we_are_people ) { ?>
                                                            <div class="founder-desc-column">
                                                                <?php if ( $who_we_are_people['image'] ) { ?>
                                                                    <div class="founder-img">
                                                                        <img src="<?php echo $who_we_are_people['image']['url']; ?>" alt="founder img"/>
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="founder-content">
                                                                    <div class="founder-name"><?php echo $who_we_are_people['user_name']; ?></div>
                                                                    <div class="founder-designation"><?php echo $who_we_are_people['designation']; ?></div>
                                                                </div>
                                                            </div>
                                                        <?php }
                                                    } ?>
                                                    <!-- ------------- -->
                                                </div>
                                            <?php } ?>


                                            <div class="marginb-30"></div>
                                            <?php
                                        }
                                    } ?>

                                </section>
                            <?php endif;
                            $counter ++;
                        endwhile;
                    endif; ?>

                </main>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package customtheme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php wp_head();?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

    <!--Favicon Included-->
    
</head>

<body <?php body_class(); ?>>
<header>
    <div class="header-top">
        <!-- <div class="container"> -->
        <div class="header-top-container">
            <div class="header-top-left">
                <ul class="contact-list">
                    <?php if ( get_field( 'contact_no', 'options' ) ): ?>
                        <li>
                            <a href="tel:<?php echo get_field( 'contact_no', 'options' ); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/phone-ico.svg" alt="phone"/><?php echo get_field( 'contact_no', 'options' ); ?>
                            </a>
                        </li>
                    <?php endif;
                    if ( get_field( 'email_address', 'options' ) ): ?>
                        <li>
                            <a href="mailto:<?php echo get_field( 'email_address', 'options' ); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/mail-ico.svg" alt="email"/><?php echo get_field( 'email_address', 'options' ); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="header-top-right">
                <ul class="social-share">
                    <li>
                        <a href="<?php echo ( get_field( 'linkedin_link', 'options' ) ) ? get_field( 'linkedin_link', 'options' ) : 'javascript:void(0)'; ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/mail-social-ico.svg" alt="mail"/>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo ( get_field( 'linkedin_link', 'options' ) ) ? get_field( 'linkedin_link', 'options' ) : 'javascript:void(0)'; ?>"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/linkedin-ico.svg" alt="linked in"/></a>
                    </li>
                    <li>
                        <a href="<?php echo ( get_field( 'teligram_link', 'options' ) ) ? get_field( 'teligram_link', 'options' ) : 'javascript:void(0)'; ?>"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/send-ico.svg" alt="send"/></a>
                    </li>
                    <li>
                        <a href="<?php echo ( get_field( 'twitter_link', 'options' ) ) ? get_field( 'twitter_link', 'options' ) : 'javascript:void(0)'; ?>"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/twitter-ico.svg" alt="twitter"/></a>
                    </li>
                    <li>
                        <a href="<?php echo ( get_field( 'facebook_link', 'options' ) ) ? get_field( 'facebook_link', 'options' ) : 'javascript:void(0)'; ?>"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/fb-ico.svg" alt="Facebook"/></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- </div> -->
    </div>
    <div class="header-bottom">
        <!-- <div class="container"> -->
        <div class="header-bottom-container">
            <div class="logo">
                <a href="<?php echo site_url(); ?>">
                    <?php
                    if ( get_field( 'header_logo', 'options' ) ):
                        $logo     = get_field( 'header_logo', 'options' );
                        $logo_url = $logo['url'];
                    else:
                        $logo_url = get_template_directory_uri() . '/images/logo.svg';
                    endif;
                    ?>
                    <img src="<?php echo $logo_url; ?>" alt="Logo"/>
                </a>
            </div>
            <div class="header-bottom-right">
                <input type="checkbox" id="toggle-btn"/>
                <label for="toggle-btn" class="show-menu-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/nav-ico.svg" alt="nav ico"/>
                </label>
                <nav>
                    <?php wp_nav_menu(
                        array(
                            'menu'       => 'Header menu',
                            'menu_class' => 'navigation',
                            'walker'     => new My_Walker_Nav_Menu(),
                        )

                    );
                    ?>
                </nav>
            </div>
        </div>
        <!-- </div> -->
    </div>
</header>

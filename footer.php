<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package customtheme
 */

?>
<!-- ************ Footer start ************* -->
<footer>
    <div class="container">
        <div class="footer-top">
            <div class="footer-column footer-column-1">
                <div class="footer-logo">
                    <a href="<?php echo site_url(); ?>">
                        <?php
                        if ( get_field( 'footer_logo', 'options' ) ):
                            $footer_logo = get_field( 'footer_logo', 'options' );
                            $logo_url    = $footer_logo['url'];
                        else:
                            $logo_url = get_template_directory_uri() . '/images/logo.svg';
                        endif;
                        ?>
                        <img src="<?php echo $logo_url; ?>" alt="footer logo"/>
                    </a>
                </div>
                <div class="footer-logo-tagline">
                    <?php echo get_field( 'logo_tag_line', 'options' ); ?>
                </div>
            </div>
            <div class="footer-column footer-column-2">
                <div class="footer-column-header">
                    Company
                </div>
                <div class="footer-column-content">
                    <ul class="footer-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="unlisted-share.html">Unlisted Share</a></li>
                        <li><a href="#">NRI Dedk</a></li>
                        <li><a href="#">How it works</a></li>
                        <li>
                            <a href="buy-unlisted-shares.html">Buy unlisted shares</a>
                        </li>
                        <li>
                            <a href="sell-unlisted-shares.html">Sell Unlisted shares</a>
                        </li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-column footer-column-3">
                <div class="footer-column-header">
                    Contact Us
                </div>
                <div class="footer-column-content">
                    <ul class="footer-contact-list">
                        <li>
                            <a href="tel:<?php echo get_field( 'contact_no', 'options' ); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/phone-ico.svg" alt="phone"/>
                                <?php echo get_field( 'contact_no', 'options' ); ?>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:<?php echo get_field( 'email_address', 'options' ); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/mail-ico.svg" alt="email"/> <?php echo get_field( 'email_address', 'options' ); ?>
                            </a>
                        </li>
                    </ul>
                    <div class="footer-address">
                        <p><?php echo get_field( 'address', 'options' ); ?></p>
                    </div>
                </div>
            </div>
            <div class="footer-column footer-column-4">
                <div class="footer-column-header">
                    Follow us
                </div>
                <div class="footer-column-content">
                    <div class="footer-insta-link"><a href="#"><?php echo get_field( 'username', 'options' ); ?></a></div>
                    <ul class="footer-social-share">
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
        </div>

        <div class="foter-bottom">
            <?php echo get_field( 'copyright_text', 'options' ); ?>
            <?php echo get_field( 'design_and_develop_by_text', 'options' ); ?>
        </div>
    </div>
    <div class="footer-sticky-popup">
        <ul class="footer-live-chat">
            <li class="whatsup-block">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/whatsapp-ico.svg" alt="whatsup"/></a>
            </li>
            <li class="chat-block">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/chat-ico.svg" alt="chat"/></a>
            </li>
        </ul>
    </div>
</footer>
<!-- ************ Footer End  ************* -->
<script>
    jQuery(function ($) {
      var Accordion = function (el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;
        var links = this.el.find(".article-title");
        links.on(
          "click",
          {
            el: this.el,
            multiple: this.multiple,
          },
          this.dropdown
        );
      };
      Accordion.prototype.dropdown = function (e) {
        var $el = e.data.el;
        ($this = $(this)), ($next = $this.next());
        $next.slideToggle();
        $this.parent().toggleClass("open");
        if (!e.data.multiple) {
          $el
            .find(".accordion-content")
            .not($next)
            .slideUp()
            .parent()
            .removeClass("open");
        }
      };
      var accordion = new Accordion($(".accordion-container"), false);
    });

    // $(document).on("click", function(event) {
    //   if (!$(event.target).closest("#accordion").length) {
    //     $this.parent().toggleClass("open");
    //   }
    // });
    jQuery(document).ready(function ($) {
      $(".detail-nav ul li").click(function () {
        $(this).addClass("active").siblings().removeClass("active");
      });
      // Select all links with hashes
      $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
          // On-page links
          if (
            location.pathname.replace(/^\//, "") ==
              this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
          ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length
              ? target
              : $("[name=" + this.hash.slice(1) + "]");
            // Does a scroll target exist?
            if (target.length) {
              // Only prevent default if animation is actually gonna happen
              event.preventDefault();
              $("html, body").animate(
                {
                  scrollTop: target.offset().top - 20,
                },
                800,
                function () {
                  // Callback after animation
                  // Must change focus!
                  var $target = $(target);
                  $target.focus();
                  if ($target.is(":focus")) {
                    // Checking if the target was focused
                    return false;
                  } else {
                    $target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
                    $target.focus(); // Set focus again
                  }
                }
              );
            }
          }
        });
    });
  </script>

<?php wp_footer(); ?>
</body>
</html>





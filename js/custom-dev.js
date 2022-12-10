function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById( 'myInput' );
    filter = input.value.toUpperCase();
    table = document.getElementById( 'myTable' );
    tr = table.getElementsByTagName( 'tr' );
    for ( i = 0; i < tr.length; i ++ ) {
        td = tr[ i ].getElementsByTagName( 'td' )[ 0 ];
        if ( td ) {
            txtValue = td.textContent || td.innerText;
            if ( txtValue.toUpperCase().indexOf( filter ) > - 1 ) {
                tr[ i ].style.display = '';
            } else {
                tr[ i ].style.display = 'none';
            }
        }
    }
}

// *******************
jQuery( document ).ready( function( $ ) {
    var owl = $( '#bannerslider' );
    owl.owlCarousel( {
        loop: true,
        nav: true,
        lazyLoad: true,
        margin: 16,
        video: true,
        smartSpeed: 450,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            960: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    } );
} );
jQuery( document ).ready( function( $ ) {
    var owl = $( '#testimonialslider' );
    owl.owlCarousel( {
        loop: true,
        nav: false,
        dots: true,
        lazyLoad: true,
        margin: 0,
        video: true,
        center: true,
        autoplay: true,
        autoplayTimeout: 8500,
        autoplayHoverPause: true,
        smartSpeed: 450,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            960: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    } );
} );

$( function() {
    var Accordion = function( el, multiple ) {
        this.el = el || {};
        this.multiple = multiple || false;
        var links = this.el.find( '.article-title' );
        links.on(
          'click',
          {
              el: this.el,
              multiple: this.multiple
          },
          this.dropdown
        );
    };
    Accordion.prototype.dropdown = function( e ) {
        var $el = e.data.el;
        ($this = $( this )), ($next = $this.next());
        $next.slideToggle();
        $this.parent().toggleClass( 'open' );
        if ( !e.data.multiple ) {
            $el
              .find( '.accordion-content' )
              .not( $next )
              .slideUp()
              .parent()
              .removeClass( 'open' );
        }
    };
    var accordion = new Accordion( $( '.accordion-container' ), false );
} );

// $(document).on("click", function(event) {
//   if (!$(event.target).closest("#accordion").length) {
//     $this.parent().toggleClass("open");
//   }
// });
$( document ).ready( function() {

    if ( $( '.detail-nav ul li' ).length >= 1 ) {
        $( '.right_tab_active ul li' ).click( function() {
            var active_id = $( this ).find( 'a' ).attr( 'href' );

            $( '.detail-nav ul li' ).each( function() {
                if ( $( this ).find( 'a' ).attr( 'href' ) == active_id ) {
                    $( this ).addClass( 'active' )
                      .siblings()
                      .removeClass( 'active' );
                }
            } );

        } );
        $( '.detail-nav ul li' ).click( function() {
            $( this )
              .addClass( 'active' )
              .siblings()
              .removeClass( 'active' );
        } );

        // Select all links with hashes
        $( 'a[href*="#"]' )
          // Remove links that don't actually link to anything
          .not( '[href="#"]' )
          .not( '[href="#0"]' )
          .click( function( event ) {
              // On-page links
              if (
                location.pathname.replace( /^\//, '' ) ==
                this.pathname.replace( /^\//, '' ) &&
                location.hostname == this.hostname
              ) {
                  // Figure out element to scroll to
                  var target = $( this.hash );
                  target = target.length
                    ? target
                    : $( '[name=' + this.hash.slice( 1 ) + ']' );
                  // Does a scroll target exist?
                  if ( target.length ) {
                      // Only prevent default if animation is actually gonna happen
                      event.preventDefault();
                      $( 'html, body' ).animate(
                        {
                            scrollTop: target.offset().top - 20
                        },
                        800,
                        function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $( target );
                            $target.focus();
                            if ( $target.is( ':focus' ) ) {
                                // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr( 'tabindex', '-1' ); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            }
                        }
                      );
                  }
              }

          } );

    }

} );
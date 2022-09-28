(
   function( $ ) {
   
   	$('.button__show-more').on('click', function() {
    	$(this).toggleClass('isActive');
    	$(this).parent().toggleClass('isActive');
        if($(this).hasClass('isActive')) {
        	$(this).text('Скрыть')
        } else {
        	$(this).text('Показать еще')
        }
    });

      $( 'select' ).selectpicker();

      $( '.navbar-catalog .btn' ).on( 'click', function( e ) {
         e.preventDefault();
         if ( $( '.navbar-catalog' ).hasClass( 'open' ) ) {
            $( document.body ).removeClass( 'catalog-open' );
            $( '.navbar-catalog' ).removeClass( 'open' );
         } else {
            $( '.navbar-catalog' ).addClass( 'open' );
            $( document.body ).addClass( 'catalog-open' );
         }
      });
      const $menu = $( '.navbar-catalog' );
      $( document.body ).on( 'click', function( e ) {
         if ( ! $menu.is( e.target ) && 0 === $menu.has( e.target ).length ) {
            $( '.navbar-catalog' ).removeClass( 'open' );
            $( document.body ).removeClass( 'catalog-open' );
         }
      });

      var myCollapsible = document.getElementById( 'navbarSupportedContent' );
      myCollapsible.addEventListener( 'show.bs.collapse', function() {
         $( document.body ).addClass( 'backdrop-show' );
      });

      myCollapsible.addEventListener( 'hide.bs.collapse', function() {
         $( document.body ).removeClass( 'backdrop-show' );
      });

      function binds() {
         $( '.main-categories > li.has-subcategory > a' ).on( 'click', function( e ) {
            e.preventDefault();
            $( this ).parent().addClass( 'show' );
         });

         $( '.subcategory_back' ).on( 'click', function( e ) {
            e.preventDefault();
            $( this ).parent().parent().removeClass( 'show' );
         });

         $( 'form[name="s"]' ).focusin( function() {
            $( this ).addClass( 'focus' );
         });
         $( 'form[name="s"]' ).focusout( function() {
            $( this ).removeClass( 'focus' );
         });

         $( '.filter-drop' ).on( 'click', function( e ) {
            e.preventDefault();
            if ( $( '.filter' ).hasClass( 'show' ) ) {
               $( this ).removeClass( 'show' );
               $( '.filter' ).removeClass( 'show' );
            } else {
               $( this ).addClass( 'show' );
               $( '.filter' ).addClass( 'show' );
            }
         });
      }

      const gallery = new Swiper( '.gallery', {
         speed: 400,
         spaceBetween: 100,
         loop: true
      });

      if ( 960 > window.innerWidth ) {
         binds();
      }

      $( '.shops .shop-card' ).each( function() {
            const element = $( this ).find( '.blurred_overlay__up' );
         $( this ).mousemove( function( event ) {
            event.preventDefault();
               const rect = $(this)[0].getBoundingClientRect();
            const upX = event.clientX;
            const upY = event.clientY;          
            element.css( "clip-path", `circle(60px at ${upX - rect.left}px ${upY - rect.top}px)` )
         });
            $( this ).mouseleave( function( event ) {
               event.preventDefault();  
              const upX = event.clientX;
            const upY = event.clientY; 
              const rect = $(this)[0].getBoundingClientRect();
            element.css( "clip-path", `circle(0px at ${upX - rect.left}px ${upY - rect.top}px)` )
            });
      });

      function updateFraction( slider ) {
         const { params, realIndex } = slider;

         slider.$el
            .find( `.${params.pagination.currentClass}` )
            .text( `${realIndex + 1}` );

         slider.$el
            .find( `.${params.pagination.totalClass}` )
            .text( slider.slides.length );

         const slides_count = Math.round( (
                                            slider.slides.length
                                         ) / params.slidesPerView );
         let dots = '';

         for ( let i = 0; i <= slides_count; i++ ) {
            dots += '<span class="dot"></span>';
         }

         slider.$el
            .find( '.dots' )
            .html( dots );

      }

      const swiper_slider = new Swiper( '.slider .swiper', {

         loop: false,

         //autoHeight: true,

         // If we need paginatio
         pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
            renderFraction: ( currentClass, totalClass ) => `<span class='${currentClass}'></span>/<span class='${totalClass}'></span>`
         },

         // Navigation arrows
         navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
         },

         // And if we need scrollbar
         scrollbar: {
            el: '.swiper-scrollbar'
         },
         on: {
            init() {
               setTimeout( updateFraction, 0, this );
            },
            slideChange() {
               updateFraction( this );
            },
            resize() {
               updateFraction( this );
            }
         }
      });

      const swiper_sales = new Swiper( '.sales .swiper', {

         spaceBetween: 30,

         //centeredSlides: true,
         //centeredSlidesBounds: true,
         autoHeight: false,
         loop: true,
         slidesPerView: 'auto',
         visibilityFullFit: true,
         autoResize: false,

         // If we need pagination
         pagination: {
            el: '.sales-swiper-pagination',
            type: 'fraction',
            renderFraction: ( currentClass, totalClass ) => `<span class='${currentClass}'></span> из <span class='${totalClass}'></span>`
         },

         // Navigation arrows
         navigation: {
            nextEl: '.sales-swiper-button-next',
            prevEl: '.sales-swiper-button-prev'
         },

         // And if we need scrollbar
         scrollbar: {
            el: '.swiper-scrollbar'
         },
         on: {
            init() {
               updateFraction( this );
            },
            slideChange() {
               updateFraction( this );
            },
            resize() {
               updateFraction( this );
            }
         }
      });

      const shops_slider = new Swiper( '.shops-slider.swiper', {
         centeredSlides: false,

         spaceBetween: 30,

         //centeredSlidesBounds: true,
         autoHeight: false,
         loop: false,
         slidesPerView: 'auto',
         visibilityFullFit: true,
         autoResize: false,

         pagination: {
            el: '.shops-slider__swiper-pagination',
            clickable: true,
            renderBullet: function( index, className ) {
               return `<span class="dot swiper-pagination-bullet"></span>`;
            }
         },

         // Navigation arrows
         navigation: {
            nextEl: '.shops-slider__swiper-button-next',
            prevEl: '.shops-slider__swiper-button-prev'
         },

         // And if we need scrollbar
         scrollbar: {
            el: '.swiper-scrollbar'
         },
         on: {
            init() {
               updateFraction( this );
            },
            slideChange() {
               updateFraction( this );
            },
            resize() {
               updateFraction( this );
            }
         }
      });

      const swiper_news = new Swiper( '.news3', {

         slidesPerView: 4,
         spaceBetween: 30,
         autoHeight: false,

         pagination: {
            el: '.news-swiper-pagination',
            clickable: true,
            renderBullet: function( index, className ) {
               return `<span class="dot swiper-pagination-bullet"></span>`;
            }
         },

         navigation: {
            nextEl: '.news-swiper-button-next',
            prevEl: '.news-swiper-button-prev'
         },

         // And if we need scrollbar
         scrollbar: {
            el: '.news-swiper-scrollbar'
         },
         on: {
            init() {
               setTimeout( updateFraction, 0, this );
            },
            slideChange() {
               updateFraction( this );
            },
            resize() {
               updateFraction( this );
            }
         },
         breakpoints: {

            // when window width is >= 320px
            320: {
               slidesPerView: 1,
               spaceBetween: 20,
               centeredSlides: true,
               centeredSlidesBounds: true
            },

            // when window width is >= 480px
            680: {
               slidesPerView: 3,
               spaceBetween: 30
            },

            // when window width is >= 640px
            1000: {
               slidesPerView: 4,
               spaceBetween: 30
            }

         }
      });

      const swiper_news3 = new Swiper( '.newsjs .swiper', {

         slidesPerView: 4,
         spaceBetween: 30,
         autoHeight: false,

         pagination: {
            el: '.news-swiper-pagination',
            clickable: true,
            renderBullet: function( index, className ) {
               return `<span class="dot swiper-pagination-bullet"></span>`;
            }
         },

         navigation: {
            nextEl: '.news-swiper-button-next',
            prevEl: '.news-swiper-button-prev'
         },

         // And if we need scrollbar
         scrollbar: {
            el: '.news-swiper-scrollbar'
         },
         on: {
            init() {
               setTimeout( updateFraction, 0, this );
            },
            slideChange() {
               updateFraction( this );
            },
            resize() {
               updateFraction( this );
            }
         },
         breakpoints: {

            // when window width is >= 320px
            320: {
               slidesPerView: 1,
               spaceBetween: 20,
               centeredSlides: true,
               centeredSlidesBounds: true
            },

            // when window width is >= 480px
            680: {
               slidesPerView: 3,
               spaceBetween: 30
            },

            // when window width is >= 640px
            1000: {
               slidesPerView: 4,
               spaceBetween: 30
            }

         }
      });
      $( document ).ready(function() {
setTimeout( function() {

      const swiper_news2 = new Swiper( '.news2 .swiper', {

         slidesPerView: 2,
         spaceBetween: 30,
         autoHeight: false,

         pagination: {
            el: '.news-swiper-pagination',
            clickable: true,
            renderBullet: function( index, className ) {
               return `<span class="dot swiper-pagination-bullet"></span>`;
            }
         },

         navigation: {
            nextEl: '.news-swiper-button-next',
            prevEl: '.news-swiper-button-prev'
         },

         // And if we need scrollbar
         scrollbar: {
            el: '.news-swiper-scrollbar'
         },
         on: {
            init() {
               setTimeout( updateFraction, 0, this );
            },
            slideChange() {
               updateFraction( this );
            },
            resize() {
               updateFraction( this );
            }
         },
         breakpoints: {

            // when window width is >= 320px
            320: {
               slidesPerView: 1,
               spaceBetween: 20,
               centeredSlides: true,
               centeredSlidesBounds: true
            },

            // when window width is >= 480px
            960: {
               slidesPerView: 2,
               spaceBetween: 30
            },

            // when window width is >= 640px
            1000: {
               slidesPerView: 2,
               spaceBetween: 30
            }

         }
      });
}, 500);
});

      let galleryTop = new Swiper( '.gallery-top', {
         spaceBetween: 10,
         navigation: {
            nextEl: '.salon-swiper-button-next',
            prevEl: '.salon-swiper-button-prev'
         },
         loop: false,
      });
      let galleryThumbs = new Swiper( '.gallery-thumbs', {
         spaceBetween: 10,
         centeredSlides: true,
         slidesPerView: 'auto',
         slideToClickedSlide: true,
         loop: false,
      });
      galleryTop.controller.control = galleryThumbs;
      galleryThumbs.controller.control = galleryTop;
     if ($('.gallery-top').length) {
     	galleryThumbs.slideTo(0);
     }

      const salonsSwiper = new Swiper( '.salons-swiper', {
         slidesPerView: 5,
         spaceBetween: 30,
         loop: true,
         loopFillGroupWithBlank: true,
         autoHeight: true,
         autoplay: true,
         pagination: {
            el: '.swiper-pagination',
            clickable: true
         },
         navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
         }
      });

      $( '[type="tel"]' ).inputmask({ 'mask': '+7 (999) 999-9999' });

      jQuery( function() {
         const $WIN = jQuery( window );

         //jQuery(".lazyload").lazyload();

         const clReviewsCarousel = () => {
            jQuery( '.reviews-carousel' ).owlCarousel({
               loop: false,

               //center: true,
               margin: 30,
               responsiveClass: true,
               nav: true,
               dots: false,
               autoHeight: false,
               stagePadding: 200,

               //autoplay: true,
               //autoplaySpeed: 5000,
               //autoplayHoverPause: false,
               slideTransition: 'linear',
               lazyLoad: true,
               responsive: {
                  0: {
                     items: 1,
                     nav: true
                  },
                  600: {
                     items: 3,
                     nav: true
                  },
                  1000: {
                     items: 3,
                     nav: true
                  }
               }
            });
         };

         /* Animate On Scroll
          * ------------------------------------------------------ */
         const clAOS = function() {
            AOS.init({
               offset: 200,
               duration: 600,
               easing: 'ease-in-sine',
               delay: 300,
               once: true,
               disable: 'mobile'
            });
         };

         /* Smooth Scrolling
          * ------------------------------------------------------ */
         const clSmoothScroll = function() {
            jQuery( '.smoothscroll' ).on( 'click', function( e ) {
               var target = this.hash,
                  $target = jQuery( target );

               e.preventDefault();
               e.stopPropagation();

               jQuery( 'html, body' )
                  .stop()
                  .animate({
                     scrollTop: $target.offset().top
                  },
                  cfg.scrollDuration,
                  'swing'
                  )
                  .promise()
                  .done( function() {

                     // check if menu is open
                     if ( jQuery( 'body' ).hasClass( 'menu-is-open' ) ) {
                        jQuery( '.header-menu-toggle' ).trigger( 'click' );
                     }

                     window.location.hash = target;
                  });
            });
         };

         function ssInit() {

            clAOS();

            jQuery( '.search-example' ).on( 'click', 'a', function( e ) {
               e.preventDefault();

               jQuery( '[name=s]' ).val( jQuery( this ).text() );
               jQuery( '[name=form-search]' ).submit();
            });
         }

         ssInit();

      });

   }( jQuery )
);
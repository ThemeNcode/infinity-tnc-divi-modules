// External Dependencies
import React, { Component } from 'react';
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

class ImageCarousel extends Component {

  static slug = 'inftnc_image_carousel';

  static css(props, moduleInfo) {
   const utils         = window.ET_Builder.API.Utils;
   const additionalCss = [];

    // Process slide spacing value into style
    if (props.slide_spacing) {
      additionalCss.push([{
        selector:    '%%order_class%% .slick-slide',
        declaration: `padding-left:${props.slide_spacing};`,
      }]);
    }

   // Process slide spacing value into style
    if (props.slide_spacing) {
      additionalCss.push([{
        selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-list',
        declaration: `margin-left:-${props.slide_spacing};`,
      }]);
    }

    // Process responsive slide spacing value into style
    if(props.slide_spacing) {
        const 	slide_last_edited =  props.slide_spacing_last_edited; 
        const   slide_responsive_active = slide_last_edited && slide_last_edited.startsWith("on")
        //Tablet 
        if( props.slide_spacing_tablet && slide_responsive_active){
          additionalCss.push([{
            selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-list',
            declaration: `margin-left:-${props.slide_spacing_tablet};`,
            device: 'tablet',
          }]);
          
          additionalCss.push([{
            selector:    '%%order_class%% .slick-slide',
            declaration: `padding-left:${props.slide_spacing_tablet};`,
            device: 'tablet',
          }]);
        }
        // Phone 
        if( props.slide_spacing_phone && slide_responsive_active){
          additionalCss.push([{
            selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-list',
            declaration: `margin-left:-${props.slide_spacing_phone};`,
            device: 'phone',
          }]);
          
          additionalCss.push([{
            selector:    '%%order_class%% .slick-slide',
            declaration: `padding-left:${props.slide_spacing_phone};`,
            device: 'phone',
          }]);
        }
    }

    // Process navigaton value into style
    if (props.navigation_icon_size) {
      additionalCss.push([{
        selector:    '%%order_class%% .slick-inftnc-arrow.slick-prev:before',
        declaration: `font-size:${props.navigation_icon_size};`,
      }]);
    }

    // Process navigaton value into style
    if (props.navigation_icon_size) {
      additionalCss.push([{
        selector:    '%%order_class%% .slick-inftnc-arrow.slick-next:before',
        declaration: `font-size:${props.navigation_icon_size};`,
      }]);
    }

    // Navigation responsive icon size 
    if(props.navigation_icon_size) {
        const 	navigation_icon_size_last_edited =  props.navigation_icon_size_last_edited; 
        const   navigation_icon_responsive_active = navigation_icon_size_last_edited && navigation_icon_size_last_edited.startsWith("on")
        // Tablet 
        if(props.navigation_icon_size_tablet && navigation_icon_responsive_active ) {
          additionalCss.push([{
            selector:    '%%order_class%% .slick-inftnc-arrow.slick-prev:before',
            declaration: `font-size:${props.navigation_icon_size_tablet};`,
            device: 'tablet',
          }]);

          additionalCss.push([{
            selector:    '%%order_class%% .slick-inftnc-arrow.slick-next:before',
            declaration: `font-size:${props.navigation_icon_size_tablet};`,
          }]);

        }
        // Phone
        if(props.navigation_icon_size_phone && navigation_icon_responsive_active ) {
          additionalCss.push([{
            selector:    '%%order_class%% .slick-inftnc-arrow.slick-prev:before',
            declaration: `font-size:${props.navigation_icon_size_phone};`,
            device: 'tablet',
          }]);

          additionalCss.push([{
            selector:    '%%order_class%% .slick-inftnc-arrow.slick-next:before',
            declaration: `font-size:${props.navigation_icon_size_phone};`,
          }]);
        }
    }

      // Process Navitgation Bg Value Into Style 
      if (props.navigation_bg_size) {
        additionalCss.push([{
          selector:    '%%order_class%% .slick-inftnc-arrow',
          declaration: `width:${props.navigation_bg_size}!important;height:${props.navigation_bg_size}!important;`,
        }]);
      }
      // Process Navitgation responsive bg value into style 
      if(props.navigation_bg_size) {
         const 	navigation_bg_size_last_edited =  props.navigation_bg_size_last_edited; 
         const  navigation_bg_responsive_active = navigation_bg_size_last_edited && navigation_bg_size_last_edited.startsWith("on")
         // Tablet 
         if (props.navigation_bg_size_tablet && navigation_bg_responsive_active ) {
          additionalCss.push([{
            selector:    '%%order_class%% .slick-inftnc-arrow',
            declaration: `width:${props.navigation_bg_size_tablet}!important;height:${props.navigation_bg_size_tablet}!important;`,
            device:'tablet',
          }]);
        }
        // Phone 
        if (props.navigation_bg_size_phone && navigation_bg_responsive_active ) {
          additionalCss.push([{
            selector:    '%%order_class%% .slick-inftnc-arrow',
            declaration: `width:${props.navigation_bg_size_phone}!important;height:${props.navigation_bg_size_phone}!important;`,
            device:'phone',
          }]);
        } 
      }

       // Process Navigation bg color into style
        if (props.navigation_bg_color) {
          additionalCss.push([{
            selector:    '%%order_class%% .slick-inftnc-arrow',
            declaration: `background-color:${props.navigation_bg_color}!important;`,
          }]);
        }

        // Process Navigation icon color into style
        if (props.navigation_icon_color) {
          additionalCss.push([{
            selector:    '%%order_class%% .slick-inftnc-arrow.slick-next:before',
            declaration: `color:${props.navigation_icon_color}!important;`,
          }]);
        }

        if (props.navigation_icon_color) {
          additionalCss.push([{
            selector:    '%%order_class%% .slick-inftnc-arrow.slick-prev:before',
            declaration: `color:${props.navigation_icon_color}!important;`,
          }]);
        }

        // Process pagination dots size into style 
        if (props.pagination_cmn_dots_size) {
          additionalCss.push([{
            selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li button:before',
            declaration: `font-size:${props.pagination_cmn_dots_size}!important;`,
          }]);
        }

        additionalCss.push([{
            selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots',
            declaration: `bottom:unset!important;`,
        }]);
        
         // Process responsive pagination dots size into style 

         if(props.pagination_cmn_dots_size){
              const  pagination_cmn_dots_size_last_edited =  props.pagination_cmn_dots_size_last_edited; 
              const  navigation_bg_responsive_active = pagination_cmn_dots_size_last_edited && pagination_cmn_dots_size_last_edited.startsWith("on")  
             // Tablet
              if (props.pagination_cmn_dots_size_tablet && navigation_bg_responsive_active) {
                additionalCss.push([{
                  selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li button:before',
                  declaration: `font-size:${props.pagination_cmn_dots_size_tablet}!important;`,
                }]);
              }
              //Phone
              if (props.pagination_cmn_dots_size_phone && navigation_bg_responsive_active) {
                additionalCss.push([{
                  selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li button:before',
                  declaration: `font-size:${props.pagination_cmn_dots_size_phone}!important;`,
                }]);
              }
         }

         // Process pagination dots size into style 
        if (props.pagination_active_dots_size) {
          additionalCss.push([{
            selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li.slick-active button:before',
            declaration: `font-size:${props.pagination_active_dots_size}!important;`,
          }]);
        }

         // Process responsive pagination dots size into style 
         if(props.pagination_active_dots_size){
              const   pagination_active_dots_size_last_edited =  props.pagination_active_dots_size_last_edited; 
              const   pagination_dots_active_responsive_active = pagination_active_dots_size_last_edited && pagination_active_dots_size_last_edited.startsWith("on")  
             // Tablet
              if (props.pagination_active_dots_size_tablet && pagination_dots_active_responsive_active) {
                additionalCss.push([{
                  selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li.slick-active button:before',
                  declaration: `font-size:${props.pagination_active_dots_size_tablet}!important;`,
                  device:'tablet',
                }]);
              }
              //Phone
              if (props.pagination_active_dots_size_phone && pagination_dots_active_responsive_active) {
                additionalCss.push([{
                  selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li.slick-active button:before',
                  declaration: `font-size:${props.pagination_active_dots_size_phone}!important;`,
                  device:'phone',
                }]);
              }
         }

         // Process dots aligment value into style 
          if (props.dots_alignment) {
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots',
              declaration: `display:flex!important;justify-content:${props.dots_alignment};margin-top: 25px;`,
            }]);
          }

          // Process responsive  dots aligment value into style  
          if(props.dots_alignment){
              const   dots_alignment_last_edited =  props.dots_alignment_last_edited; 
              const   dots_alignment_responsive_active = dots_alignment_last_edited && dots_alignment_last_edited.startsWith("on")  
              //Tablet
              if (props.dots_alignment_tablet && dots_alignment_responsive_active) {
                additionalCss.push([{
                  selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots',
                  declaration: `display:flex!important;justify-content:${props.dots_alignment_tablet};margin-top: 25px;`,
                  device:'tablet',
                }]);
              }
               //Phone 
               if (props.dots_alignment_phone && dots_alignment_responsive_active) {
                additionalCss.push([{
                  selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots',
                  declaration: `display:flex!important;justify-content:${props.dots_alignment_phone};margin-top: 25px;`,
                  device:'phone',
                }]);
              }
          }
          //Process dots color value into style 
          if (props.pagination_cmn_dots_color) {
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_carousels_image_wrapper .slick-dots li button:before',
              declaration: `color:${props.pagination_cmn_dots_color};`,
            }]);
          }

      	// Process logo gray scale default value into style
          if (props.image_grayscale_default === 'on') {
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img',
              declaration: `-webkit-filter: grayscale(100%); filter: grayscale(100%);
                              transition: -webkit-filter .5s ease 0s; transition: filter .5s ease 0s;`,
            }]);
          }
  
          if (props.image_grayscale_default === 'on') {
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img:hover',
              declaration: `-webkit-filter: grayscale(0); filter: none;`,
            }]);
          }
  
          // Process logo gray scale hover value into style
  
          if (props.image_grayscale_hover === 'on') {
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img',
              declaration: `-webkit-filter: grayscale(0); filter: none; transition: -webkit-filter .5s ease 0s; transition: filter .5s ease 0s;`,
            }]);
          }
  
          if (props.image_grayscale_hover === 'on') {
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img:hover',
              declaration: `-webkit-filter: grayscale(100%); filter: grayscale(100%);`,
            }]);
          }
  
          // Logo Hover Effectcs 
  
          //Process logo zoom in effect value into style
          if (props.image_hover === 'zoom_in') {
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img',
              declaration: `transition: transform .5s ease 0s;
              -webkit-transition: -webkit-transform .5s ease 0s;`,
            }]);
          }
  
          if (props.image_hover === 'zoom_in') {
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img:hover',
              declaration: `-webkit-transform: scale(1.04);
              -moz-transform: scale(1.04);
              -ms-transform: scale(1.04);
              -o-transform: scale(1.04);
              transform: scale(1.04);'`,
            }]);
          }
  
          //Process logo zoom in effect value into style
          if (props.image_hover === 'zoom_out') {
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img',
              declaration: `transition: transform .5s ease 0s;
              -webkit-transition: -webkit-transform .5s ease 0s;
              transform-origin: center center;
              -webkit-transform-origin: center center;
              transform: scale(1.04);
              -webkit-transform: scale(1.04);`,
            }]);
          }
  
          if (props.image_hover === 'zoom_out') {
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img:hover',
              declaration: `transform: scale(1);
              -webkit-transform: scale(1);`,
            }]);
          }

         //Process logo slide in effect value into style
         if (props.image_hover === 'slide') {
          additionalCss.push([{
            selector:    '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img',
            declaration: `margin-left: 10px;
						-webkit-transform: scale(1.01, 1.01);
						transform: scale(1.01, 1.01);
						-webkit-transition: all .5s ease 0s;
						transition: all .5s ease 0s;`,
          }]);
        }

        if (props.image_hover === 'slide') {
          additionalCss.push([{
            selector:    '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img:hover',
            declaration: `margin-left: 0;`,
          }]);
        }

         //Process logo rotate in effect value into style
         if (props.image_hover === 'rotate') {
          additionalCss.push([{
            selector:    '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img',
            declaration: `-webkit-transform: rotate(15deg) scale(1.4);
						transform: rotate(15deg) scale(1.4);
						-webkit-transition: all .5s ease 0s;
						transition: all .5s ease 0s;`,
          }]);
        }

        if (props.image_hover === 'rotate') {
          additionalCss.push([{
            selector:    '%%order_class%% .inftnc_carousels_image_wrapper .image_carousel_img:hover',
            declaration: `-webkit-transform: rotate(0) scale(1);
						transform: rotate(0) scale(1);
						-webkit-transition: all .5s ease 0s;
						transition: all .5s ease 0s;`,
          }]);
        }


    return additionalCss;

  }

  NextArrow = ({ onClick }) => {
    return (
      <button type="button" className="slick-inftnc-arrow slick-next" onClick={onClick} data-icon="&#x35;"></button>
    );
  }

  PrevArrow = ({ onClick }) => {
    return (
      <button type="button" className="slick-inftnc-arrow slick-prev" onClick={onClick} data-icon="&#x34;"></button>
    );
  }

  render() {
    // Destructure Props 
    const {slides_to_show,slides_to_show_tablet,slides_to_show_phone,slides_to_scroll,slides_to_scroll_tablet,slides_to_scroll_phone,animation_speed,autoplay,autoplay_speed,use_navigation,use_pagination,infinite,pause_on_hover,swipe,rtl,content}   = this.props;

    let autoPlayValue;
    autoplay == 'on' ? autoPlayValue = true : autoPlayValue = false ;
    let paginationValue 
    use_pagination == 'on' ? paginationValue = true :  paginationValue = false ;
    let navigationValue 
    use_navigation == 'on' ? navigationValue = true :  navigationValue = false ;
    let pauseHoverValue;
    pause_on_hover == 'on' ? pauseHoverValue = true :  pauseHoverValue = false ;
    let swipeValue;
    swipe == 'on' ? swipeValue = true :  swipeValue = false ;
    let rtlValue;
    rtl == 'on' ? rtlValue = true :  rtlValue = false ;

    // Fix infinite Issue 
    let image_length = content.length;
    let imageInfinite = image_length >= slides_to_show && infinite === "on" ? true  : false;

    var settings = { 
      speed: parseInt(animation_speed),
      slidesToShow: slides_to_show ? parseInt(slides_to_show) : 3,
      slidesToScroll: slides_to_scroll ? parseInt(slides_to_scroll) : 1,
      autoplay: autoPlayValue,
      autoplaySpeed: parseInt(autoplay_speed),
      arrows: navigationValue,
      dots:paginationValue,
      infinite: imageInfinite,
      rtl:rtlValue,
      swipe: swipeValue,
      pauseOnHover: pauseHoverValue,
      prevArrow: <this.PrevArrow />,
      nextArrow: <this.NextArrow />,
      responsive: [
        {
          breakpoint: 980,
          settings: {
            slidesToShow: slides_to_show_tablet ? parseInt(slides_to_show_tablet) : 3,
            slidesToScroll: slides_to_scroll_tablet ? parseInt(slides_to_scroll_tablet) : 1,
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: slides_to_show_phone ? parseInt(slides_to_show_phone) : 2,
            slidesToScroll: slides_to_scroll_phone ? parseInt(slides_to_scroll_phone) : 1,
          }
        },
      ]
    };

    return (
  
        <Slider {...settings} className="inftnc_carousels_image_wrapper">{this.props.content}</Slider>
      
    );
  }
}

export default ImageCarousel;
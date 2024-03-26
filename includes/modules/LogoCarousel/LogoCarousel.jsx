// External Dependencies
import React, { Component } from 'react';
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";



class LogoCarousel extends Component {

  static slug = 'inftnc_logo_carousel';

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
        selector:    '%%order_class%% .inftnc_carousels_logo_wrapper .slick-list',
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
            selector:    '%%order_class%% .inftnc_carousels_logo_wrapper .slick-list',
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
            selector:    '%%order_class%% .inftnc_carousels_logo_wrapper .slick-list',
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
    const {slides_to_show,slides_to_show_tablet,slides_to_show_phone,slides_to_scroll,slides_to_scroll_tablet,slides_to_scroll_phone,animation_speed,autoplay,autoplay_speed,use_navigation,use_pagination,slide_spacing,infinite,pause_on_hover,swipe,rtl,logo_grayscale_default,logo_grayscale_hover,logo_hover,navigation_icon_size,navigation_bg_size,navigation_icon_color,navigation_bg_color,pagination_cmn_dots_size,pagination_active_dots_size,pagination_cmn_dots_color,dots_alignment,content}   = this.props;

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
     let logo_length = content.length;
     let logoInfinite = logo_length >= slides_to_show && infinite === "on" ? true  : false;

    var settings = { 
      speed: parseInt(animation_speed),
      slidesToShow: slides_to_show ? parseInt(slides_to_show) : 3,
      slidesToScroll: slides_to_scroll ? parseInt(slides_to_scroll) : 1,
      autoplay: autoPlayValue,
      autoplaySpeed: parseInt(autoplay_speed),
      arrows: navigationValue,
      dots:paginationValue,
      infinite: logoInfinite,
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
  
        <Slider {...settings} className="inftnc_carousels_logo_wrapper">{this.props.content}</Slider>
      
    );
  }
}

export default LogoCarousel;
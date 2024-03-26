// External Dependencies
import React, { Component } from 'react';
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import { type } from 'jquery';


class LogoCarousel extends Component {

  static slug = 'inftnc_logo_carousel';

  static css(props, moduleInfo) {
   const utils         = window.ET_Builder.API.Utils;
   const additionalCss = [];

    // // Process slide spacing value into style
    if (props.slide_spacing) {
      additionalCss.push([{
        selector:    '%%order_class%% .inftnc_logo_carousel_child',
        declaration: `padding-left:${props.slide_spacing};`,
      }]);
    }

   // Process slide spacing value into style
    if (props.slide_spacing) {
      additionalCss.push([{
        selector:    '%%order_class%% .inftnc_carousels_logo_wrapper .slick-list',
        declaration: `padding-left:${props.slide_spacing};`,
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
    const {slides_to_show,slides_to_show_tablet,slides_to_show_phone,slides_to_scroll,slides_to_scroll_tablet,slides_to_scroll_phone,animation_speed,autoplay,autoplay_speed,use_navigation,use_pagination,slide_spacing,infinite,pause_on_hover,swipe,rtl,logo_grayscale_default,logo_grayscale_hover,logo_hover,navigation_icon_size,navigation_bg_size,navigation_icon_color,navigation_bg_color,pagination_cmn_dots_size,pagination_active_dots_size,pagination_cmn_dots_color,dots_alignment}   = this.props;

    let autoPlayValue;
    autoplay == 'on' ? autoPlayValue = true : autoPlayValue = false ;
    let paginationValue 
    use_pagination == 'on' ? paginationValue = true :  paginationValue = false ;
    let navigationValue 
    use_navigation == 'on' ? navigationValue = true :  navigationValue = false ;
    let infiniteValue;
    infinite == 'on' ? infiniteValue = true :  infiniteValue = false ;
    let pauseHoverValue;
    pause_on_hover == 'on' ? pauseHoverValue = true :  pauseHoverValue = false ;
    let swipeValue;
    swipe == 'on' ? swipeValue = true :  swipeValue = false ;
    let rtlValue;
    rtl == 'on' ? rtlValue = true :  rtlValue = false ;

    console.log(slides_to_show_tablet);

    var settings = { 
      speed: parseInt(animation_speed),
      slidesToShow: slides_to_show ? parseInt(slides_to_show) : 3,
      slidesToScroll: slides_to_scroll ? parseInt(slides_to_scroll) : 1,
      autoplay: autoPlayValue,
      autoplaySpeed: parseInt(autoplay_speed),
      arrows: navigationValue,
      dots:paginationValue,
      infinite: infinite,
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
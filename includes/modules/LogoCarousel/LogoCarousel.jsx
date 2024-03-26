// External Dependencies
import React, { Component } from 'react';
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import { type } from 'jquery';


class LogoCarousel extends Component {

  static slug = 'inftnc_logo_carousel';

//   static css(props, moduleInfo) {
//    const utils         = window.ET_Builder.API.Utils;
//    const additionalCss = [];

//    // Process button background  value into style
//     // if (props.button_bg) {
//     //   additionalCss.push([{
//     //     selector:    '%%order_class%% .inftnc_share_link',
//     //     declaration: `background-color: ${props.button_bg};`,
//     //   }]);
//     // }

//    return additionalCss;

//  }

    NextArrow() {
      return (
        <button type="button" className="slick-inftnc-arrow slick-prev" data-icon="&#x34;"></button>
      );
    }

    PrevArrow() {
      return (
        <button type="button" className="slick-inftnc-arrow slick-next" data-icon="&#x35;"></button>
      );
    }

  render() {
    // Destructure Props 
    const {slides_to_show,slides_to_scroll,animation_speed,autoplay,autoplay_speed,use_navigation,use_pagination,slide_spacing,infinite,pause_on_hover,swipe,rtl,logo_grayscale_default,logo_grayscale_hover,logo_hover,navigation_icon_size,navigation_bg_size,navigation_icon_color,navigation_bg_color,pagination_cmn_dots_size,pagination_active_dots_size,pagination_cmn_dots_color,dots_alignment}   = this.props;

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
      prevArrow: <this.NextArrow></this.NextArrow>,
      nextArrow: <this.PrevArrow></this.PrevArrow>,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: slides_to_scroll,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            initialSlide: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    };

    return (
      <div>
        <Slider {...settings} className="inftnc_carousels_logo_wrapper">{this.props.content} </Slider>
      </div>
    );
  }
}

export default LogoCarousel;
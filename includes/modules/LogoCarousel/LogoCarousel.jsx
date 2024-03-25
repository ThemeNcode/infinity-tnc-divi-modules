// External Dependencies
import React, { Component } from 'react';
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";


class LogoCarousel extends Component {

  static slug = 'inftnc_logo_carousel';

  render() {
    // Destructure Props 
    const {slides_to_show,slides_to_scroll,animation_speed,autoplay,autoplay_speed,use_navigation,use_pagination,slide_spacing,infinite,pause_on_hover,swipe,rtl,logo_grayscale_default,logo_grayscale_hover,logo_hover,navigation_icon_size,navigation_bg_size,navigation_icon_color,navigation_bg_color,pagination_cmn_dots_size,pagination_active_dots_size,pagination_cmn_dots_color,dots_alignment}   = this.props;

    var settings = { 
      dots: true,
      infinite: false,
      speed: animation_speed,
      slidesToShow:slides_to_show,
      slidesToScroll: slides_to_scroll,
      initialSlide: 0,
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
// External Dependencies
import React, { Component } from 'react';
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";


class LogoCarousel extends Component {

  static slug = 'inftnc_logo_carousel';

  render() {

    var settings = {
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
    };
  
    return (
      <div>
        <Slider {...settings}>{this.props.content} </Slider>
      </div>
    );
  }
}

export default LogoCarousel;
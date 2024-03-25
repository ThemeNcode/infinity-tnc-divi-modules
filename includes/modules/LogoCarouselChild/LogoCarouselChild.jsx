import React, { Component } from 'react';
import './style.css';

class LogoCarouselChild extends Component {

  static slug = 'inftnc_logo_carousel_child';

  render() {

    const {logo,alt}  = this.props;
    
    return (
          <div className="inftnc_carousel_child"> 
            <img className="logo_carousel_img" src={logo} alt={alt} /> 
           </div>
    );
  }
}

export default LogoCarouselChild;

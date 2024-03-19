// External Dependencies
import React, { Component } from 'react';


class LogoCarousel extends Component {

  static slug = 'inftnc_logo_carousel';

  /**
   * Module render in VB
   * Basically DICM_CTA_Parent->render() equivalent in JSX
   */
  render() {
    return (
      <div>
        <div className="dicm-content">{this.props.content}</div>
      </div>
    );
  }
}

export default LogoCarousel;
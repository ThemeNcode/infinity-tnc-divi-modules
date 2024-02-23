// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class BreadCrumbs extends Component {

  static slug = 'inftnc_bread_crumbs';

  render() {
    const props              = this.props;
    const utils              = window.ET_Builder.API.Utils;
    return (
      <div className="inftnc_breadcrumb">
         <span class="before"></span>
         <span property="itemListElement" typeof="ListItem">
           <a property="item" typeof="WebPage" href="http://localhost:8888/infinity-divi/" class="home"><span property="name">Home</span></a>
           <span class="inftnc_separator et-pb-icon">5</span>
           <span class="inftnc_current">Infinity Test Module</span>
         </span>
      </div>
    );
  }
}

export default BreadCrumbs;

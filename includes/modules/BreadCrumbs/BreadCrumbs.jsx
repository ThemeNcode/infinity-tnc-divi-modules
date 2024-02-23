// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class BreadCrumbs extends Component {

  static slug = 'inftnc_bread_crumbs';

  render() {
    const props              = this.props;
    const utils              = window.ET_Builder.API.Utils;
    const {home_text,before_text,seperator_icon}       = props;
    const seperatorIcon     = seperator_icon ? utils.processFontIcon(seperator_icon) : false;

    console.log(props);
    return (
      <div className="inftnc_breadcrumb">
         <span class="before">{before_text}</span>
         <span property="itemListElement" typeof="ListItem">
           <a className="home" href="http://localhost:8888/infinity-divi/" ><span property="name">{home_text}</span></a>
           <span className="inftnc_separator et-pb-icon">{seperatorIcon}</span>
           <span className="inftnc_current"> <a href="#">Breadcrumbs</a></span>
         </span>
      </div>
    );
  }
}

export default BreadCrumbs;

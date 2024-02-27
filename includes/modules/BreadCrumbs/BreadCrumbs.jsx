// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class BreadCrumbs extends Component {

  static slug = 'inftnc_bread_crumbs';

  static css(props, moduleInfo) {
      const utils         = window.ET_Builder.API.Utils;
      const additionalCss = [];

      if (props.link_color) {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_breadcrumb a',
          declaration: `color: ${props.link_color};`,
        }]);
      }
  
      if (props.seperate_icon_color) {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_separator',
          declaration: `color: ${props.seperate_icon_color};`,
        }]);
      }

      if (props.current_text_color) {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_current',
          declaration: `color: ${props.current_text_color};`,
        }]);
      }

      return additionalCss;
    }
    

  render() {
    const props              = this.props;
    const utils              = window.ET_Builder.API.Utils;
    const {home_text,before_text,seperator_icon,before_text_icon,use_before_icon}       = props;
    const seperatorIcon      = seperator_icon ? utils.processFontIcon(seperator_icon) : false;
    const beforeIcon         = before_text_icon ? utils.processFontIcon(before_text_icon) : false;
    const useBeforeIcon      =  use_before_icon == 'on' ? beforeIcon : false;

    return (
      <div className="inftnc_breadcrumb">
          
           <span class="inftnc_before et-pb-icon">{useBeforeIcon}</span>
           <span class="before">{before_text}</span>
           <a className="home" href="http://localhost:8888/infinity-divi/" ><span property="name">{home_text}</span></a>
           <span className="inftnc_separator et-pb-icon">{seperatorIcon}</span>
           <span className="inftnc_current"> <a href="#">Breadcrumbs</a></span>
      </div>
    );
  }
}

export default BreadCrumbs;

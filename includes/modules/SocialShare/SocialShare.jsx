// External Dependencies
import React, { Component } from 'react';
import SocialShareChild from '../SocialShareChild/SocialShareChild';


class SocialShare extends Component {

  static slug = 'inftnc_social_share';

   static css(props, moduleInfo) {
    const utils         = window.ET_Builder.API.Utils;
    const additionalCss = [];

    // Process button background  value into style
    if (props.button_bg) {
      additionalCss.push([{
        selector:    '%%order_class%% .inftnc_share_link',
        declaration: `background-color: ${props.button_bg};`,
      }]);
    }

     // Process button background  value into style
     if (props.icon_color) {
      additionalCss.push([{
        selector:    '%%order_class%% .inftnc_social_icon',
        declaration: `color: ${props.icon_color};`,
      }]);
    }

      // Process icon color value into style
      if (props.icon_color) {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_social_icon',
          declaration: `color: ${props.icon_color};`,
        }]);
      }

       // Process icon size value into style
       if (props.icon_size) {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_social_icon',
          declaration: `font-size: ${props.icon_size};`,
        }]);
      }

    return additionalCss;
  }



  render() {

    return (
          <div className="inftnc_social_share_wrapper">{this.props.content}
            <SocialShareChild layout={this.props.button_layout}></SocialShareChild>
          </div>
          
    );
  }
}

export default SocialShare;
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

       // Process button padding value into style
        if (props.button_padding) {
          const inftnc_button_padding = props.button_padding.split("|");
          additionalCss.push([{
            selector: '%%order_class%% .inftnc_share_link',
            declaration: `padding-top: ${inftnc_button_padding[0]}; padding-right: ${inftnc_button_padding[1]}; padding-bottom: ${inftnc_button_padding[2]}; padding-left: ${inftnc_button_padding[3]};`,
          }]);
       }

       //Social Share Button column style 

       if(props.columns === 'column_auto') {
          additionalCss.push([{
                selector:'%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));`,
          }]);
       }

        if(props.columns === 'column_one') {
          additionalCss.push([{
                selector:'%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(1, 1fr);`,
          }]);
        }

      if(props.columns === 'column_two') {
          additionalCss.push([{
                selector:'%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(2, 1fr);`,
          }]);
      }

      if(props.columns === 'column_three') {
        additionalCss.push([{
              selector:'%%order_class%% .inftnc_social_share_wrapper',
              declaration: `display:grid;grid-template-columns:repeat(3, 1fr);`,
        }]);
    }

    if(props.columns === 'column_four') {
      additionalCss.push([{
            selector:'%%order_class%% .inftnc_social_share_wrapper',
            declaration: `display:grid;grid-template-columns:repeat(4, 1fr);`,
      }]);
    }

    if(props.columns === 'column_five') {
      additionalCss.push([{
            selector:'%%order_class%% .inftnc_social_share_wrapper',
            declaration: `display:grid;grid-template-columns:repeat(5, 1fr);`,
      }]);
    }

    if(props.columns === 'column_six') {
      additionalCss.push([{
            selector:'%%order_class%% .inftnc_social_share_wrapper',
            declaration: `display:grid;grid-template-columns:repeat(6, 1fr);`,
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
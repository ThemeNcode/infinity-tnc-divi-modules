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

    // Process  Column Gap value into style
    if(props.columns_gap) {
      additionalCss.push([{
            selector:'%%order_class%% .inftnc_social_share_wrapper',
            declaration: `grid-column-gap:${props.columns_gap};`,
      }]);
    }
    // Process on Gap value into style
    if(props.row_gap) {
      additionalCss.push([{
            selector:'%%order_class%% .inftnc_social_share_wrapper',
            declaration: `grid-row-gap:${props.row_gap};`,
      }]);
    }

    // Social Share button shape 

    if(props.button_shape === 'button_square') {
      additionalCss.push([{
            selector:'%%order_class%% .inftnc_share_link',
            declaration: `border-radius:0px;`,
      }]);
    }

    if(props.button_shape === 'button_square') {
      additionalCss.push([{
            selector:'%%order_class%% .inftnc_share_link',
            declaration: `border-radius:0px;`,
      }]);
    }

    if(props.button_shape === 'button_rounded') {
      additionalCss.push([{
            selector:'%%order_class%% .inftnc_share_link',
            declaration: `border-radius:10px;`,
      }]);
    }
    //only icon 
    if(props.button_layout === 'only_icon' && props.button_shape ==='button_circle'){
        additionalCss.push([{
            selector:'%%order_class%% .inftnc_share_link',
            declaration: `border-radius: 100px;width: 45px;padding: 10px;	text-align:center; display:unset !important;`,
        }]);
    } 
    // Margin unset
    if(props.button_layout === 'only_icon' && props.button_shape ==='button_circle'){
      additionalCss.push([{
          selector:'%%order_class%% .inftnc_social_icon',
          declaration: `margin-left:unset;`,
      }]);
    } 
    // only icon column 
    if(props.button_layout === 'only_icon' && props.button_shape ==='button_circle' && props.columns === 'column_auto'){
      additionalCss.push([{
          selector:'%%order_class%% .inftnc_social_share_wrapper',
          declaration: `display: flex !important; flex-direction: row !important; column-gap: ${props.columns_gap}!important; row-gap: ${props.row_gap}!important; flex-wrap: wrap !important;`,
      }]);
    } 
    // only text radius
    if(props.button_layout === 'only_text' && props.button_shape ==='button_circle'){
      additionalCss.push([{
          selector:'%%order_class%% .inftnc_share_link',
          declaration: `border-radius:30px;`,
      }]);
    } 
    // only icon with text
    if(props.button_layout === 'icon_with_text' && props.button_shape ==='button_circle'){
      additionalCss.push([{
          selector:'%%order_class%% .inftnc_share_link',
          declaration: `border-radius:30px;`,
      }]);
    } 

    // Responsive Column Layout

    if(props.columns){

            const 	column_responsive_last_edited =  props.columns_last_edited; 
            const   column_responsive_active = column_responsive_last_edited && column_responsive_last_edited.startsWith("on")
            //Responsive Column Tablet
            //Resonsive Column Auto
            if (props.columns_tablet === 'column_auto' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));`,
                device: 'tablet',
              }]);
            }

            //Resonsive Column  One 
            if (props.columns_tablet === 'column_one' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(1, 1fr);`,
                device: 'tablet',
              }]);
            } 

            //Resonsive Column  Two
            if (props.columns_tablet === 'column_two' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(2, 1fr);`,
                device: 'tablet',
              }]);
            } 

             //Resonsive Column  Three
             if (props.columns_tablet === 'column_three' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(3, 1fr);`,
                device: 'tablet',
              }]);
            } 

             //Resonsive Column  Four 
             if (props.columns_tablet === 'column_four' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(4, 1fr);`,
                device: 'tablet',
              }]);
            } 

             //Resonsive Column  Five
             if (props.columns_tablet === 'column_five' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(5, 1fr);`,
                device: 'tablet',
              }]);
            } 

             //Resonsive Column  Six 
             if (props.columns_tablet === 'column_six' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(6, 1fr);`,
                device: 'tablet',
              }]);
            } 

            //Responsive Column Phonw
            //Resonsive Column Auto
            if (props.columns_phone === 'column_auto' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));`,
                device: 'phone',
              }]);
            }

            //Resonsive Column  One
            if (props.columns_phone === 'column_one' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(1, 1fr);`,
                device: 'phone',
              }]);
            } 

            //Resonsive Column  Two 
            if (props.columns_phone === 'column_two' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(2, 1fr);`,
                device: 'phone',
              }]);
            } 
            
             //Resonsive Column Three 
             if (props.columns_phone === 'column_three' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(3, 1fr);`,
                device: 'phone',
              }]);
            } 

             //Resonsive Column  Four 
             if (props.columns_phone === 'column_four' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(4, 1fr);`,
                device: 'phone',
              }]);
            } 

             //Resonsive Column  Five
             if (props.columns_phone === 'column_five' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(5, 1fr);`,
                device: 'phone',
              }]);
            } 

             //Resonsive Column  Six 
             if (props.columns_phone === 'column_six' && column_responsive_active) {
              additionalCss.push([{
                selector: '%%order_class%% .inftnc_social_share_wrapper',
                declaration: `display:grid;grid-template-columns:repeat(6, 1fr);`,
                device: 'phone',
              }]);
            } 
     }
     //only icon 

     if (props.button_layout === 'only_icon' && (props.button_shape === 'button_circle' || props.button_shape === 'button_rounded' || props.button_shape === 'button_square' )) {
      additionalCss.push([{
        selector: '%%order_class%% .inftnc_social_text',
        declaration: `display:none;`,
      }]);
    }

    if (props.button_layout === 'only_icon' && (props.button_shape === 'button_rounded' || props.button_shape === 'button_square' )) {
      additionalCss.push([{
        selector: '%%order_class%% .inftnc_share_link',
        declaration: `justify-content:center;`,
      }]);
    }
 
    if (props.button_layout === 'only_text') {
      additionalCss.push([{
        selector: '%%order_class%% .inftnc_social_icon',
        declaration: `display:none;`,
      }]);
    } 

    if (props.button_layout === 'only_icon') {
      additionalCss.push([{
        selector: '%%order_class%% .inftnc_social_text',
        declaration: `display:none;`,
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
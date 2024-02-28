// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class HeadingGradient extends Component {

  static slug = 'inftnc_heading_gradient';

  static css(props, moduleInfo) {
    const utils         = window.ET_Builder.API.Utils;
    const additionalCss = [];

    if (props.gradient_options === 'gradient_custom_color'){

      if( props.gradient_type === 'linear_gradient') {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_gradient_title',
          declaration: `
          background: -webkit-linear-gradient( ${props.linear_position}, ${props.start_color} ${props.start_position}%, ${props.end_color} ${props.end_position}% );
          -webkit-background-clip: text !important;
          -webkit-text-fill-color: transparent;
          `,
        }]);
      }
  
      if( props.gradient_type === 'radial_gradient') {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_gradient_title',
          declaration: `
          background: radial-gradient( circle farthest-corner at ${props.radial_position}, ${props.start_color} ${props.start_position}%, ${props.end_color} ${props.end_position}% );
          -webkit-background-clip: text !important;
          -webkit-text-fill-color: transparent;
          `,
        }]);
      }
  
      if( props.gradient_type === 'ellipse') {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_gradient_title',
          declaration: `
          background: radial-gradient( ellipse farthest-corner at ${props.ellipse_position}, ${props.start_color} ${props.start_position}%, ${props.end_color} ${props.end_position}% );
          -webkit-background-clip: text !important;
          -webkit-text-fill-color: transparent;
          `,
        }]);
      }

    } else if (props.gradient_options === 'gradient_preset_color'){

      if( props.presets_gradient === 'gradient_preset1') {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_gradient_title',
          declaration: `
            background: linear-gradient(to right, #03658C 0%, #63BBF2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
          `,
        }]);
      }
  
      if( props.presets_gradient === 'gradient_preset2') {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_gradient_title',
          declaration: `
            background: linear-gradient(to right, #F1543F 0%, #FDC362 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
          `,
        }]);
      }
  
      if( props.presets_gradient === 'gradient_preset3') {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_gradient_title',
          declaration: `
            background: linear-gradient(to bottom right, #30303B 0%, #EAE9E7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
          `,
        }]);
      }
  
      if( props.presets_gradient === 'gradient_preset4') {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_gradient_title',
          declaration: `
            background: linear-gradient(to right, #8C5B49 0%, #D9BBA0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
          `,
        }]);
      }
  
      if( props.presets_gradient === 'gradient_preset5') {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_gradient_title',
          declaration: `
            background: linear-gradient(to right, #044D29 0%, #97ED8A 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
          `,
        }]);
      }
  
      if( props.presets_gradient === 'gradient_preset6') {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_gradient_title',
          declaration: `
             background: linear-gradient(to right, #481CA6 0%, #AC43D9 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
          `,
        }]);
      }

    }
    return additionalCss;
  }


  render() {
    const {gradient_title,title_level}       = this.props;
    const HeadingTag = `${title_level}`;
    return (
          <div className="et_pb_module inftnc_heading_gradient">
              <HeadingTag className="inftnc_gradient_title et_pb_module_header">
                  {gradient_title}
              </HeadingTag>
          </div>
    );
  }
}

export default HeadingGradient;

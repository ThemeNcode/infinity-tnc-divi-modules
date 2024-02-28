// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class HeadingGradient extends Component {

  static slug = 'inftnc_heading_gradient';

  static css(props, moduleInfo) {
    const utils         = window.ET_Builder.API.Utils;
    const additionalCss = [];
   
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

   
    return additionalCss;
  }


  render() {
    const props              = this.props;
    const utils              = window.ET_Builder.API.Utils;
    const {gradient_title,title_level}                 = this.props;
    console.log();
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

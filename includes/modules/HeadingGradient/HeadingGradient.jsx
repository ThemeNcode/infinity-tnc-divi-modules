// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class HeadingGradient extends Component {

  static slug = 'inftnc_heading_gradient';

  static css(props, moduleInfo) {
    const utils         = window.ET_Builder.API.Utils;
    const additionalCss = [];

    if (props.link_color) {
      additionalCss.push([{
        selector:    '%%order_class%% .inftnc_breadcrumb a',
        declaration: `color: ${props.link_color};`,
      }]);
    }
    return additionalCss;
  }


  render() {
    const props              = this.props;
    const utils              = window.ET_Builder.API.Utils;
    const {gradient_title,title_level,gradient_options}                 = this.props;
    console.log(title_level);
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

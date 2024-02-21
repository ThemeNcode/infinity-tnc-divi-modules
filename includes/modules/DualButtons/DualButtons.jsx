// External Dependencies
import React, { Component } from 'react';

class DualButtons extends Component {

  static slug = 'inftnc_dual_buttons';

  _renderButton() {
    const props              = this.props;
    const utils              = window.ET_Builder.API.Utils;
    const buttonTargetRight  = 'on' === props.button_url_right_new_window ? '_blank' : '';
    const buttonTargetLeft   = 'on' === props.button_url_left_new_window ? '_blank' : '';
    const buttonIcon         = props.button_icon ? utils.processFontIcon(props.button_icon) : false;
    const buttonClassName    = {
      et_pb_button:             true,
      et_pb_custom_button_icon: props.button_icon,
    };

    return (
    <div className='et_pb_button_wrapper'>
        <a
          className={`${utils.classnames(
            buttonClassName
          )} infinity_button_right`}
          target={buttonTargetRight}
          href={props.button_url_left}
          data-icon={buttonIcon}
        >
          {props.button_left_text}
        </a>
        <a 
           className={`${utils.classnames(
            buttonClassName
          )} infinity_button_left`}
          target={buttonTargetLeft}
          href={props.button_url_right} 
          data-icon={buttonIcon}
         >
          {props.button_right_text}
        </a>
      </div>
    );
  }
  

  render() {
    return (
      <div className="infinity-btn-wrapper">
          {this._renderButton()};
      </div>
    );
  }
}

export default DualButtons;
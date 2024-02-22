// External Dependencies
import React, { Component } from 'react';

class DualButtons extends Component {

  static slug = 'inftnc_dual_buttons';

  _renderButton() {
    const props              = this.props;
    const utils              = window.ET_Builder.API.Utils;
    const buttonTargetRight  = 'on' === props.button_url_right_new_window ? '_blank' : '';
    const buttonTargetLeft   = 'on' === props.button_url_left_new_window ? '_blank' : '';
    const buttonIconLeft     = props.button_left_icon ? utils.processFontIcon(props.button_left_icon) : false;
    const buttonClassNameLeft    = {
      et_pb_button:             true,
      et_pb_custom_button_icon: props.button_left_icon,
    };
    const buttonIconRight     = props.button_right_icon ? utils.processFontIcon(props.button_right_icon) : false;
    const buttonClassNameRight    = {
      et_pb_button:             true,
      et_pb_custom_button_icon: props.button_right_icon,
    };

    console.log(props);
    return (
    <div className='et_pb_button_module_wrapper et_pb_module '>
         <a 
           className={`${utils.classnames(
            buttonClassNameLeft 
          )} inftnc_pb_button_left`}
          target={buttonTargetLeft}
          href={props.button_url_left} 
          rel={utils.linkRel(props.button_rel)}
          data-icon={buttonIconLeft}
         >
          {props.button_left_text}
        </a>
        <a
          className={`${utils.classnames(
            buttonClassNameRight
          )} inftnc_pb_button_right`}
          target={buttonTargetRight}
          href={props.button_url_right}
          data-icon={buttonIconRight}
        >
          {props.button_right_text}
        </a> 
      </div>
    );
  }
  

  render() {
    return (
      <div>
          {this._renderButton()}
      </div>
    )
  }
}

export default DualButtons;
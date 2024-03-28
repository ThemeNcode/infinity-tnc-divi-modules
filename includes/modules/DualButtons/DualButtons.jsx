// External Dependencies
import React, { Component } from 'react';

class DualButtons extends Component {

  static slug = 'inftnc_dual_buttons';

  static css(props, moduleInfo) {
    const utils         = window.ET_Builder.API.Utils;
    const additionalCss = [];

     // Process button alignment value into style
      if (props.button_alignment) {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_button_wrapper',
          declaration: `justify-content: ${props.button_alignment};`,
        }]);
      }

      // Process responsive  button alignment value into style 
        if(props.button_alignment) {
          const 	button_alignment_last_edited =  props.button_alignment_last_edited; 
          const   button_alignment_responsive_active = button_alignment_last_edited && button_alignment_last_edited.startsWith("on")
          //Tablet 
          if( props.button_alignment_tablet && button_alignment_responsive_active){
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_button_wrapper',
              declaration: `justify-content: ${props.button_alignment_tablet};`,
              device: 'tablet',
            }]);
          }
          // Phone 
          if( props.button_alignment_phone && button_alignment_responsive_active){
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_button_wrapper',
              declaration: `justify-content: ${props.button_alignment_phone};`,
              device: 'phone',
            }]);
          }
      }

      // Process button alignment value into style
      if (props.button_gap) {
        additionalCss.push([{
          selector:    '%%order_class%% .inftnc_button_wrapper',
          declaration: `gap: ${props.button_gap};`,
        }]);
      }

      // Process responsive  button alignment value into style 
      if(props.button_gap) {
          const 	button_gap_last_edited =  props.button_gap_last_edited; 
          const   button_gap_responsive_active = button_gap_last_edited && button_gap_last_edited.startsWith("on")
          //Tablet 
          if( props.button_gap_tablet && button_gap_responsive_active){
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_button_wrapper',
              declaration: `gap: ${props.button_gap_tablet};`,
              device: 'tablet',
            }]);
          }
          // Phone 
          if( props.button_gap_phone && button_gap_responsive_active){
            additionalCss.push([{
              selector:    '%%order_class%% .inftnc_button_wrapper',
              declaration: `gap: ${props.button_gap_phone};`,
              device: 'phone',
            }]);
          }
      }

    return additionalCss;
  }


  _renderButton() {
    const props              = this.props;
    const utils              = window.ET_Builder.API.Utils;
    const buttonTargetRight  = 'on' === props.button_url_right_new_window ? '_blank' : '';
    const buttonTargetLeft   = 'on' === props.button_url_left_new_window ? '_blank' : '';
    const buttonIconLeft     =  utils.processFontIcon(props.button_left_icon);
    const buttonClassNameLeft    = {
      et_pb_button:             true,
      et_pb_custom_button_icon: props.button_left_icon,
    };
    const buttonIconRight     =  utils.processFontIcon(props.button_right_icon);
    const buttonClassNameRight    = {
      et_pb_button:             true,
      et_pb_custom_button_icon: props.button_right_icon,
    };

    return (
    <div className="inftnc_button_wrapper et_pb_button_module_wrapper et_pb_module inftnc_pb_button_module">
         <a 
           className={`${utils.classnames(
            buttonClassNameLeft 
          )} inftnc_pb_button_left et_pb_bg_layout_light`}
          target={buttonTargetLeft}
          href={props.button_url_left} 
          rel={utils.linkRel(props.button_left_rel)}
          data-icon={buttonIconLeft}
         >
          {props.button_left_text}
        </a>
        <a
          className={`${utils.classnames(
            buttonClassNameRight
          )} inftnc_pb_button_right et_pb_bg_layout_light`}
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
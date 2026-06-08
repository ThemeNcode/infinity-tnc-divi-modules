import { CssFieldsProps } from '@divi/module';
import { DualButtonCssAttr } from './types';

export const cssFields: CssFieldsProps<DualButtonCssAttr>['cssFields'] = {
  button_wrapper: {
    label: 'Button Wrapper',
    subName: 'button_wrapper',
    selectorSuffix: ' .inftnc_button_wrapper',
  },
  left_button: {
    label: 'Left Button',
    subName: 'left_button',
    selectorSuffix: ' .inftnc_pb_button_left',
  },
  right_button: {
    label: 'Right Button',
    subName: 'right_button',
    selectorSuffix: ' .inftnc_pb_button_right',
  },
};

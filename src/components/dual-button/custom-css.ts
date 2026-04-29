import { CssFieldsProps } from '@divi/module';
import { DualButtonCssAttr } from './types';

export const cssFields: CssFieldsProps<DualButtonCssAttr>['cssFields'] = {
  button_wrapper: {
    subName: 'button_wrapper',
    selectorSuffix: ' .inftnc_button_wrapper',
  },
  left_button: {
    subName: 'left_button',
    selectorSuffix: ' .inftnc_pb_button_left',
  },
  right_button: {
    subName: 'right_button',
    selectorSuffix: ' .inftnc_pb_button_right',
  },
};

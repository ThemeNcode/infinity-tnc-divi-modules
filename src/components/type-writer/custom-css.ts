import { CssFieldsProps } from '@divi/module';
import { TypeWriterCssAttr } from './types';

export const cssFields: CssFieldsProps<TypeWriterCssAttr>['cssFields'] = {
  main_title: {
    subName: 'main_title',
    selectorSuffix: ' .inftnc_typewriter_main_title',
  },
  before_text: {
    subName: 'before_text',
    selectorSuffix: ' .inftnc_before_text',
  },
  after_text: {
    subName: 'after_text',
    selectorSuffix: ' .inftnc_after_text',
  },
};

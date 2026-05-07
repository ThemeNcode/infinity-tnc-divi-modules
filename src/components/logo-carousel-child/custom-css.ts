import { CssFieldsProps } from '@divi/module';
import { LogoCarouselChildAttrs } from './types';

export const cssFields: CssFieldsProps<LogoCarouselChildAttrs['css']>['cssFields'] = {
  logo: {
    subName: 'logo',
    selectorSuffix: ' .logo_carousel_img',
  },
};

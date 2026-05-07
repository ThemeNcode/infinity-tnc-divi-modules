import { CssFieldsProps } from '@divi/module';
import { LogoCarouselAttrs } from './types';

export const cssFields: CssFieldsProps<LogoCarouselAttrs['css']>['cssFields'] = {
  logo: {
    subName: 'logo',
    selectorSuffix: ' .logo_carousel_img',
  },
  navigation: {
    subName: 'navigation',
    selectorSuffix: ' .slick-inftnc-arrow',
  },
  pagination: {
    subName: 'pagination',
    selectorSuffix: ' .inftnc_carousels_logo_wrapper .slick-dots',
  },
};

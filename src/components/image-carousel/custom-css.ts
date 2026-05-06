import { CssFieldsProps } from '@divi/module';
import { ImageCarouselAttrs } from './types';

export const cssFields: CssFieldsProps<ImageCarouselAttrs['css']>['cssFields'] = {
  image: {
    subName: 'image',
    selectorSuffix: ' .image_carousel_img',
  },
  navigation: {
    subName: 'navigation',
    selectorSuffix: ' .slick-inftnc-arrow',
  },
  pagination: {
    subName: 'pagination',
    selectorSuffix: ' .inftnc_carousels_image_wrapper .slick-dots',
  },
};

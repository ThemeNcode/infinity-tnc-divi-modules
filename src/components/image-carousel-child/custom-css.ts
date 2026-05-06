import { CssFieldsProps } from '@divi/module';
import { ImageCarouselChildAttrs } from './types';

export const cssFields: CssFieldsProps<ImageCarouselChildAttrs['css']>['cssFields'] = {
  image: {
    subName: 'image',
    selectorSuffix: ' .image_carousel_img',
  },
};

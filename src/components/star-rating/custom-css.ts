import { CssFieldsProps } from '@divi/module';
import { StarRatingCssAttr } from './types';

export const cssFields: CssFieldsProps<StarRatingCssAttr>['cssFields'] = {
  star_wrapper: {
    subName: 'star_wrapper',
    selectorSuffix: ' .inftnc_rating_inner_wrapper',
  },
  rating_title: {
    subName: 'rating_title',
    selectorSuffix: ' .inftnc_rating_title',
  },
  rating_number: {
    subName: 'rating_number',
    selectorSuffix: ' .inftnc_star_rating_number',
  },
};

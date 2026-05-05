import { CssFieldsProps } from '@divi/module';
import { SocialShareAttrs } from './types';

export const cssFields: CssFieldsProps<SocialShareAttrs['css']>['cssFields'] = {
  wrapper: {
    subName: 'wrapper',
    selectorSuffix: ' .inftnc_social_share_wrapper',
  },
  share_link: {
    subName: 'share_link',
    selectorSuffix: ' .inftnc_share_link',
  },
  social_icon: {
    subName: 'social_icon',
    selectorSuffix: ' .inftnc_social_icon',
  },
  social_text: {
    subName: 'social_text',
    selectorSuffix: ' .inftnc_social_text',
  },
};

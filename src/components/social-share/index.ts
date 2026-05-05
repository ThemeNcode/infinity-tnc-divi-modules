import {
  type Metadata,
  type ModuleLibrary,
} from '@divi/types';

import metadata from './module.json';
import { SocialShareEdit } from './edit';
import { SocialShareAttrs } from './types';
import { conversionOutline } from './conversion-outline';

export const socialShare: ModuleLibrary.Module.RegisterDefinition<SocialShareAttrs> = {
  metadata: metadata as Metadata.Values<SocialShareAttrs>,
  conversionOutline,
  childrenName: ['inftnc/social-share-child'],
  template: [
    ['inftnc/social-share-child', {}],
    ['inftnc/social-share-child', {}],
  ],
  renderers: {
    edit: SocialShareEdit,
  },
};

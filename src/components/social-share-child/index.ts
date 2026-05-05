import {
  type Metadata,
  type ModuleLibrary,
} from '@divi/types';

import metadata from './module.json';
import { SocialShareChildEdit } from './edit';
import { SocialShareChildAttrs } from './types';
import { conversionOutline } from './conversion-outline';

import './style.scss';

export const socialShareChild: ModuleLibrary.Module.RegisterDefinition<SocialShareChildAttrs> = {
  metadata: metadata as Metadata.Values<SocialShareChildAttrs>,
  conversionOutline,
  parentsName: ['inftnc/social-share'],
  renderers: {
    edit: SocialShareChildEdit,
  },
};

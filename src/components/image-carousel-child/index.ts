import {
  type Metadata,
  type ModuleLibrary,
} from '@divi/types';

import metadata from './module.json';
import { ImageCarouselChildEdit } from './edit';
import { ImageCarouselChildAttrs } from './types';
import { conversionOutline } from './conversion-outline';

import './style.scss';

export const imageCarouselChild: ModuleLibrary.Module.RegisterDefinition<ImageCarouselChildAttrs> = {
  metadata: metadata as Metadata.Values<ImageCarouselChildAttrs>,
  conversionOutline,
  parentsName: ['inftnc/image-carousel'],
  renderers: {
    edit: ImageCarouselChildEdit,
  },
};

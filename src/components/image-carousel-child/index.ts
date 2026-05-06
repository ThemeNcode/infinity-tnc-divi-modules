import {
  type Metadata,
  type ModuleLibrary,
} from '@divi/types';

import metadata from './module.json';
import { ImageCarouselChildEdit } from './edit';
import { ImageCarouselChildAttrs } from './types';
import { conversionOutline } from './conversion-outline';
import { placeholderContent } from './placeholder-content';

import './style.scss';

export const imageCarouselChild: ModuleLibrary.Module.RegisterDefinition<ImageCarouselChildAttrs> = {
  metadata: metadata as Metadata.Values<ImageCarouselChildAttrs>,
  conversionOutline,
  parentsName: ['inftnc/image-carousel'],
  placeholderContent,
  renderers: {
    edit: ImageCarouselChildEdit,
  },
};

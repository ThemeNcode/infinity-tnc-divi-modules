import {
  type Metadata,
  type ModuleLibrary,
} from '@divi/types';

import metadata from './module.json';
import { ImageCarouselEdit } from './edit';
import { ImageCarouselAttrs } from './types';
import { conversionOutline } from './conversion-outline';

export const imageCarousel: ModuleLibrary.Module.RegisterDefinition<ImageCarouselAttrs> = {
  metadata: metadata as Metadata.Values<ImageCarouselAttrs>,
  conversionOutline,
  childrenName: ['inftnc/image-carousel-child'],
  template: [
    ['inftnc/image-carousel-child', {}],
    ['inftnc/image-carousel-child', {}],
    ['inftnc/image-carousel-child', {}],
  ],
  renderers: {
    edit: ImageCarouselEdit,
  },
};

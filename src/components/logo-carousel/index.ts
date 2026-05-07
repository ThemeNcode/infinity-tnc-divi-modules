import {
  type Metadata,
  type ModuleLibrary,
} from '@divi/types';

import metadata from './module.json';
import { LogoCarouselEdit } from './edit';
import { LogoCarouselAttrs } from './types';
import { conversionOutline } from './conversion-outline';

export const logoCarousel: ModuleLibrary.Module.RegisterDefinition<LogoCarouselAttrs> = {
  metadata: metadata as Metadata.Values<LogoCarouselAttrs>,
  conversionOutline,
  childrenName: ['inftnc/logo-carousel-child'],
  template: [
    ['inftnc/logo-carousel-child', {}],
    ['inftnc/logo-carousel-child', {}],
    ['inftnc/logo-carousel-child', {}],
  ],
  renderers: {
    edit: LogoCarouselEdit,
  },
};

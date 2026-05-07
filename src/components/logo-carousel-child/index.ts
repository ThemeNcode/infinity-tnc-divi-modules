import {
  type Metadata,
  type ModuleLibrary,
} from '@divi/types';

import metadata from './module.json';
import { LogoCarouselChildEdit } from './edit';
import { LogoCarouselChildAttrs } from './types';
import { conversionOutline } from './conversion-outline';
import { placeholderContent } from './placeholder-content';

import './style.scss';

export const logoCarouselChild: ModuleLibrary.Module.RegisterDefinition<LogoCarouselChildAttrs> = {
  metadata: metadata as Metadata.Values<LogoCarouselChildAttrs>,
  conversionOutline,
  parentsName: ['inftnc/logo-carousel'],
  placeholderContent,
  renderers: {
    edit: LogoCarouselChildEdit,
  },
};

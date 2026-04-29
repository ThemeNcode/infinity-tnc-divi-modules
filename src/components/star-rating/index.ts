import { type Metadata, type ModuleLibrary } from '@divi/types';

import metadata from './module.json';
import { StarRatingEdit } from './edit';
import { StarRatingAttrs } from './types';
import { placeholderContent } from './placeholder-content';
import { conversionOutline } from './conversion-outline';
import { SettingsContent } from './settings-content';
import { ModuleStyles } from './styles';

export const starRating: ModuleLibrary.Module.RegisterDefinition<StarRatingAttrs> = {
  metadata: metadata as Metadata.Values<StarRatingAttrs>,
  placeholderContent,
  conversionOutline,
  settings: {
    content: SettingsContent,
  },
  renderers: {
    edit: StarRatingEdit,
    styles: ModuleStyles,
  },
};

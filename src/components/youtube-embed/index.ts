import {
  type Metadata,
  type ModuleLibrary,
} from '@divi/types';

import { YoutubeEmbedEdit } from './edit';
import { SettingsContent } from './settings-content';
import { SettingsDesign } from './settings-design';
import { SettingsAdvanced } from './settings-advanced';
import metadata from './module.json';
import { YoutubeEmbedAttrs } from './types';
import { placeholderContent } from './placeholder-content';
import { conversionOutline } from './conversion-outline';
import { cssFields } from './custom-css';

export const youtubeEmbed: ModuleLibrary.Module.RegisterDefinition<YoutubeEmbedAttrs> = {
  metadata: metadata as Metadata.Values<YoutubeEmbedAttrs>,
  placeholderContent,
  conversionOutline,
  settings: {
    content:  SettingsContent,
    design:   SettingsDesign,
    advanced: SettingsAdvanced,
    css:      cssFields,
  },
  renderers: {
    edit: YoutubeEmbedEdit,
  },
};

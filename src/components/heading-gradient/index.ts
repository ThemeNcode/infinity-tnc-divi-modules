import {
  type Metadata,
  type ModuleLibrary,
} from '@divi/types';

import { HeadingGradientEdit } from './edit';
import { SettingsContent } from './settings-content';
import { SettingsDesign } from './settings-design';
import { SettingsAdvanced } from './settings-advanced';
import { ModuleStyles } from './styles';
import metadata from './module.json';
import { HeadingGradientAttrs } from './types';
import { placeholderContent } from './placeholder-content';
import { conversionOutline } from './conversion-outline';
import { cssFields } from './custom-css';

export const headingGradient: ModuleLibrary.Module.RegisterDefinition<HeadingGradientAttrs> = {
  metadata: metadata as Metadata.Values<HeadingGradientAttrs>,
  placeholderContent,
  conversionOutline,
  settings: {
    content:  SettingsContent,
    design:   SettingsDesign,
    advanced: SettingsAdvanced,
    css:      cssFields,
  },
  renderers: {
    edit: HeadingGradientEdit,
    styles: ModuleStyles,
  },
};

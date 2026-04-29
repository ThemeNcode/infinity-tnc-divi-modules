import { type Metadata, type ModuleLibrary } from '@divi/types';

import metadata from './module.json';
import { TypeWriterEdit } from './edit';
import { TypeWriterAttrs } from './types';
import { placeholderContent } from './placeholder-content';
import { conversionOutline } from './conversion-outline';
import { SettingsContent } from './settings-content';
import { ModuleStyles } from './styles';

export const typeWriter: ModuleLibrary.Module.RegisterDefinition<TypeWriterAttrs> = {
  metadata: metadata as Metadata.Values<TypeWriterAttrs>,
  placeholderContent,
  conversionOutline,
  settings: {
    content: SettingsContent,
  },
  renderers: {
    edit: TypeWriterEdit,
    styles: ModuleStyles,
  },
};

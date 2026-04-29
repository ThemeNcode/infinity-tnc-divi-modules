import { type Metadata, type ModuleLibrary } from '@divi/types';

import metadata from './module.json';
import { DualButtonEdit } from './edit';
import { DualButtonAttrs } from './types';
import { placeholderContent } from './placeholder-content';
import { conversionOutline } from './conversion-outline';
import { ModuleStyles } from './styles';

export const dualButton: ModuleLibrary.Module.RegisterDefinition<DualButtonAttrs> = {
  metadata: metadata as Metadata.Values<DualButtonAttrs>,
  placeholderContent,
  conversionOutline,
  renderers: {
    edit:   DualButtonEdit,
    styles: ModuleStyles,
  },
};

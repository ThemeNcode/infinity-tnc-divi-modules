import { __ } from '@wordpress/i18n';

import {
  type Metadata,
  type ModuleLibrary,
} from '@divi/types';

import metadata from './module.json';
import { BreadCrumbsEdit } from './edit';
import { BreadCrumbsAttrs } from './types';
import { placeholderContent } from './placeholder-content';
import { conversionOutline } from './conversion-outline';
import { SettingsContent } from './settings-content';
import { ModuleStyles } from './styles';


export const breadCrumbs: ModuleLibrary.Module.RegisterDefinition<BreadCrumbsAttrs> = {
  metadata: metadata as Metadata.Values<BreadCrumbsAttrs>,
  placeholderContent,
  conversionOutline,
  settings: {
    content: SettingsContent,
  },
  renderers: {
    edit: BreadCrumbsEdit,
    styles: ModuleStyles,
  },
};

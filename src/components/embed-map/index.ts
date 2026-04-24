// WordPress dependencies.
import { __ } from '@wordpress/i18n';

// Divi dependencies.
import {
  type Metadata,
  type ModuleLibrary,
} from '@divi/types';

// Local dependencies.
import metadata from './module.json';
import { EmbedMapEdit } from './edit';
import { EmbedMapAttrs } from './types';
import { placeholderContent } from './placeholder-content';
import { conversionOutline } from './conversion-outline';
import { SettingsContent } from './settings-content';
import { ModuleStyles } from './styles';


/**
 * Defines `EmbedMap` module for Visual Builder.
 *
 * @since ??
 */
export const embedMap: ModuleLibrary.Module.RegisterDefinition<EmbedMapAttrs> = {
  metadata: metadata as Metadata.Values<EmbedMapAttrs>,
  placeholderContent,
  conversionOutline,
  settings: {
    content: SettingsContent,
  },
  renderers: {
    edit: EmbedMapEdit,
    styles: ModuleStyles,
  },
};

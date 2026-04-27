// WordPress dependencies.
import { __ } from '@wordpress/i18n';

// Divi dependencies.
import {
  type Metadata,
  type ModuleLibrary,
} from '@divi/types';

// Local dependencies.
import metadata from './module.json';
import { VimeoVideoEdit } from './edit';
import { VimeoVideoAttrs } from './types';
import { placeholderContent } from './placeholder-content';
import { conversionOutline } from './conversion-outline';
import { SettingsContent } from './settings-content';
import { ModuleStyles } from './styles';


/**
 * Defines `VimeoVideo` module for Visual Builder.
 *
 * @since ??
 */
export const vimeoVideo: ModuleLibrary.Module.RegisterDefinition<VimeoVideoAttrs> = {
  metadata: metadata as Metadata.Values<VimeoVideoAttrs>,
  placeholderContent,
  conversionOutline,
  settings: {
    content: SettingsContent,
  },
  renderers: {
    edit: VimeoVideoEdit,
    styles: ModuleStyles,
  },
};

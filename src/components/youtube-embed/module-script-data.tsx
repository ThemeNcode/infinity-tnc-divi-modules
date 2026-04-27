import React, {
  Fragment,
  ReactElement,
} from 'react';

import {
  ModuleScriptDataProps,
} from '@divi/module';
import { YoutubeEmbedAttrs } from './types';


/**
 * Youtube Embed module's script data component.
 *
 * @since ??
 *
 * @param {ModuleScriptDataProps<YoutubeEmbedAttrs>} props React component props.
 *
 * @returns {ReactElement}
 */
export const ModuleScriptData = ({
  elements,
}: ModuleScriptDataProps<YoutubeEmbedAttrs>): ReactElement => (
  <Fragment>
    {elements.scriptData({
      attrName: 'module',
    })}
  </Fragment>
);

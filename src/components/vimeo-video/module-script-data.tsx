import React, {
  Fragment,
  ReactElement,
} from 'react';

import {
  ModuleScriptDataProps,
} from '@divi/module';
import { VimeoVideoAttrs } from './types';


/**
 * Vimeo Video module's script data component.
 *
 * @since ??
 *
 * @param {ModuleScriptDataProps<VimeoVideoAttrs>} props React component props.
 *
 * @returns {ReactElement}
 */
export const ModuleScriptData = ({
  elements,
}: ModuleScriptDataProps<VimeoVideoAttrs>): ReactElement => (
  <Fragment>
    {elements.scriptData({
      attrName: 'module',
    })}
  </Fragment>
);

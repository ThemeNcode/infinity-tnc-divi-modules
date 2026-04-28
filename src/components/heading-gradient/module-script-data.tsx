import React, {
  Fragment,
  ReactElement,
} from 'react';

import {
  ModuleScriptDataProps,
} from '@divi/module';
import { HeadingGradientAttrs } from './types';


/**
 * heading Embed module's script data component.
 *
 * @since ??
 *
 * @param {ModuleScriptDataProps<HeadingGradientAttrs>} props React component props.
 *
 * @returns {ReactElement}
 */
export const ModuleScriptData = ({
  elements,
}: ModuleScriptDataProps<HeadingGradientAttrs>): ReactElement => (
  <Fragment>
    {elements.scriptData({
      attrName: 'module',
    })}
  </Fragment>
);

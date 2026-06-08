import React, { Fragment, ReactElement } from 'react';

import { ModuleScriptDataProps } from '@divi/module';
import { DualButtonAttrs } from './types';

export const ModuleScriptData = ({
  elements,
}: ModuleScriptDataProps<DualButtonAttrs>): ReactElement => (
  <Fragment>
    {elements.scriptData({
      attrName: 'module',
    })}
  </Fragment>
);

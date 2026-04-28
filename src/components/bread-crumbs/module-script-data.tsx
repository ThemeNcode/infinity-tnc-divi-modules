import React, {
  Fragment,
  ReactElement,
} from 'react';

import {
  ModuleScriptDataProps,
} from '@divi/module';
import { BreadCrumbsAttrs } from './types';


export const ModuleScriptData = ({
  elements,
}: ModuleScriptDataProps<BreadCrumbsAttrs>): ReactElement => (
  <Fragment>
    {elements.scriptData({
      attrName: 'module',
    })}
  </Fragment>
);

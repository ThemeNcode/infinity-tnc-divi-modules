import React, { Fragment, ReactElement } from 'react';
import { ModuleScriptDataProps } from '@divi/module';
import { TypeWriterAttrs } from './types';

export const ModuleScriptData = ({
  elements,
}: ModuleScriptDataProps<TypeWriterAttrs>): ReactElement => (
  <Fragment>
    {elements.scriptData({
      attrName: 'module',
    })}
  </Fragment>
);

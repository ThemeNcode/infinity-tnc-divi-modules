import React, { Fragment, ReactElement } from 'react';
import { ModuleScriptDataProps } from '@divi/module';
import { SocialShareAttrs } from './types';

export const ModuleScriptData = ({
  elements,
}: ModuleScriptDataProps<SocialShareAttrs>): ReactElement => (
  <Fragment>
    {elements.scriptData({
      attrName: 'module',
    })}
  </Fragment>
);

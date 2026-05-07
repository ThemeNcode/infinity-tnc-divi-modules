import React, { Fragment, ReactElement } from 'react';
import { ModuleScriptDataProps } from '@divi/module';
import { LogoCarouselAttrs } from './types';

export const ModuleScriptData = ({
  elements,
}: ModuleScriptDataProps<LogoCarouselAttrs>): ReactElement => (
  <Fragment>
    {elements.scriptData({
      attrName: 'module',
    })}
  </Fragment>
);

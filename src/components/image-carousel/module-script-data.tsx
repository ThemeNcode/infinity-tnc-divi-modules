import React, { Fragment, ReactElement } from 'react';
import { ModuleScriptDataProps } from '@divi/module';
import { ImageCarouselAttrs } from './types';

export const ModuleScriptData = ({
  elements,
}: ModuleScriptDataProps<ImageCarouselAttrs>): ReactElement => (
  <Fragment>
    {elements.scriptData({
      attrName: 'module',
    })}
  </Fragment>
);

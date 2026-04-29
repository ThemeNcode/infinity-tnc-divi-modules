import React, { Fragment, ReactElement } from 'react';
import { ModuleScriptDataProps } from '@divi/module';
import { StarRatingAttrs } from './types';

export const ModuleScriptData = ({
  elements,
}: ModuleScriptDataProps<StarRatingAttrs>): ReactElement => (
  <Fragment>
    {elements.scriptData({
      attrName: 'module',
    })}
  </Fragment>
);

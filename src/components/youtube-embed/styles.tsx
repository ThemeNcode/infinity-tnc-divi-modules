import React, { ReactElement } from 'react';
import { ModuleStylesProps } from '@divi/module';
import { YoutubeEmbedAttrs } from './types';

export const ModuleStyles = ({
  attrs,
  settings,
  orderClass,
  mode,
  state,
}: ModuleStylesProps<YoutubeEmbedAttrs>): ReactElement => {
  return (
    <React.Fragment>
      {/* Styles will be added here if needed */}
    </React.Fragment>
  );
};

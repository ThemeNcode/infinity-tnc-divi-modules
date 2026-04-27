// External dependencies.
import React, { ReactElement } from 'react';

// Divi dependencies.
import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';

// Local dependencies.
import { YoutubeEmbedAttrs } from './types';
import { cssFields } from './custom-css';

/**
 * Youtube Embed module's style components.
 *
 * @since ??
 */
const ModuleStyles = ({
  attrs,
  settings,
  orderClass,
  mode,
  state,
  noStyleTag,
  elements,
}: StylesProps<YoutubeEmbedAttrs>): ReactElement => {
  return (
    <StyleContainer mode={mode} state={state} noStyleTag={noStyleTag}>
      {elements.style({
        attrName: 'module',
        styleProps: {
          disabledOn: {
            disabledModuleVisibility: settings?.disabledModuleVisibility,
          },
        },
      })}
      <CssStyle
        selector={orderClass}
        attr={attrs?.css}
        cssFields={cssFields}
      />
    </StyleContainer>
  );
}

export {
  ModuleStyles,
};

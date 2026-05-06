import React, { ReactElement } from 'react';
import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';

import { ImageCarouselChildAttrs } from './types';
import { ImageCarouselAttrs } from '../image-carousel/types';
import { cssFields } from './custom-css';

export const ModuleStyles = ({
  attrs,
  elements,
  settings,
  orderClass,
  mode,
  state,
  noStyleTag,
}: StylesProps<ImageCarouselChildAttrs, ImageCarouselAttrs>): ReactElement => (
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

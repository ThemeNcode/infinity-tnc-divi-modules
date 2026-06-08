/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { ReactElement } from 'react';
import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';

import { TypeWriterAttrs } from './types';
import { cssFields } from './custom-css';

const ModuleStyles = ({
  attrs,
  settings,
  orderClass,
  mode,
  state,
  noStyleTag,
  elements,
}: StylesProps<TypeWriterAttrs>): ReactElement => (
  <StyleContainer mode={mode as any} state={state as any} noStyleTag={noStyleTag}>
    {(elements as any).style({
      attrName: 'module',
      styleProps: {
        disabledOn: {
          disabledModuleVisibility: settings?.disabledModuleVisibility,
        },
      },
    })}
    {(elements as any).style({ attrName: 'typingText' })}
    {(elements as any).style({ attrName: 'beforeText' })}
    {(elements as any).style({ attrName: 'afterText' })}
    <CssStyle
      selector={orderClass}
      attr={attrs?.css as any}
      cssFields={cssFields}
    />
  </StyleContainer>
);

export { ModuleStyles };

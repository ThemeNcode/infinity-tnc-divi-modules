/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { ReactElement } from 'react';
import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';

import { DualButtonAttrs } from './types';
import { cssFields } from './custom-css';

const ModuleStyles = ({
  attrs,
  settings,
  orderClass,
  mode,
  state,
  noStyleTag,
  elements,
}: StylesProps<DualButtonAttrs>): ReactElement => {
  const data      = attrs?.dualButtonData?.innerContent?.desktop?.value || {};
  const alignment = data.button_alignment || 'flex-start';
  const gap       = data.button_gap || '10px';

  const wrapperCss = `${orderClass} .inftnc_button_wrapper { justify-content: ${alignment}; gap: ${gap}; }`;

  return (
    <StyleContainer mode={mode as any} state={state as any} noStyleTag={noStyleTag}>
      {(elements as any).style({
        attrName: 'module',
        styleProps: {
          disabledOn: {
            disabledModuleVisibility: settings?.disabledModuleVisibility,
          },
        },
      })}
      {(elements as any).style({ attrName: 'buttonLeft' })}
      {(elements as any).style({ attrName: 'buttonRight' })}
      <style>{wrapperCss}</style>
      <CssStyle
        selector={orderClass}
        attr={attrs?.css as any}
        cssFields={cssFields}
      />
    </StyleContainer>
  );
};

export { ModuleStyles };

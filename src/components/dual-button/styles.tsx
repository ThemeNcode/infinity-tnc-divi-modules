/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { ReactElement } from 'react';
import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';

import { DualButtonAttrs } from './types';
import { cssFields } from './custom-css';
import { buttonIconStyleDeclaration, buttonSpacingDeclaration } from './style-declarations';

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

  const leftBtnDecButton  = (attrs?.buttonLeft?.decoration  as any)?.button;
  const rightBtnDecButton = (attrs?.buttonRight?.decoration as any)?.button;

  const leftPlacement  = leftBtnDecButton?.desktop?.value?.icon?.placement  ?? 'right';
  const rightPlacement = rightBtnDecButton?.desktop?.value?.icon?.placement ?? 'right';
  const leftPseudo     = 'left' === leftPlacement  ? 'before' : 'after';
  const rightPseudo    = 'left' === rightPlacement ? 'before' : 'after';

  const wrapperCss = `${orderClass} .inftnc_button_wrapper { justify-content: ${alignment}; gap: ${gap}; }`;

  return (
    <StyleContainer mode={mode as any} state={state as any} noStyleTag={noStyleTag}>
      {/* Module decoration */}
      {(elements as any).style({
        attrName: 'module',
        styleProps: {
          disabledOn: {
            disabledModuleVisibility: settings?.disabledModuleVisibility,
          },
        },
      })}

      {/* Left button decoration + icon CSS */}
      {(elements as any).style({
        attrName: 'buttonLeft',
        styleProps: {
          advancedStyles: [
            {
              componentName: 'divi/common',
              props: {
                selector: [
                  `body #page-container .et_pb_section ${orderClass} .inftnc_pb_button_left::${leftPseudo}`,
                  `body #page-container .et_pb_section ${orderClass} .inftnc_pb_button_left:hover::${leftPseudo}`,
                ].join(', '),
                attr:                leftBtnDecButton,
                declarationFunction: buttonIconStyleDeclaration,
              },
            },
            {
              componentName: 'divi/common',
              props: {
                selector:            `body #page-container ${orderClass}`,
                attr:                leftBtnDecButton,
                declarationFunction: buttonSpacingDeclaration,
              },
            },
          ],
        },
      })}

      {/* Right button decoration + icon CSS */}
      {(elements as any).style({
        attrName: 'buttonRight',
        styleProps: {
          advancedStyles: [
            {
              componentName: 'divi/common',
              props: {
                selector: [
                  `body #page-container .et_pb_section ${orderClass} .inftnc_pb_button_right::${rightPseudo}`,
                  `body #page-container .et_pb_section ${orderClass} .inftnc_pb_button_right:hover::${rightPseudo}`,
                ].join(', '),
                attr:                rightBtnDecButton,
                declarationFunction: buttonIconStyleDeclaration,
              },
            },
            {
              componentName: 'divi/common',
              props: {
                selector:            `body #page-container ${orderClass}`,
                attr:                rightBtnDecButton,
                declarationFunction: buttonSpacingDeclaration,
              },
            },
          ],
        },
      })}

      {/* Wrapper layout CSS */}
      <style>{wrapperCss}</style>

      {/* Custom CSS */}
      <CssStyle
        selector={orderClass}
        attr={attrs?.css as any}
        cssFields={cssFields}
      />
    </StyleContainer>
  );
};

export { ModuleStyles };

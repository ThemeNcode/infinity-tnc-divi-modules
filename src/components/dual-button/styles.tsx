/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { ReactElement } from 'react';
import { processFontIcon } from '@divi/icon-library';
import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';

import { DualButtonAttrs } from './types';
import { cssFields } from './custom-css';
import { buttonIconStyleDeclaration, buttonSpacingDeclaration } from './style-declarations';

/**
 * Build `content` + `font-family` CSS rule for a button's icon pseudo-element.
 * This is needed because style_components() for custom elementType:"button"
 * attributes may not generate the correct selector for our custom <a> elements.
 */
const buildIconContentCss = (btnDecorationButton: any, selector: string): string => {
  const value = btnDecorationButton?.desktop?.value ?? {};

  if ('off' === (value?.enable ?? 'off')) return '';
  if ('off' === (value?.icon?.enable ?? 'off')) return '';

  const settings = value?.icon?.settings;
  if (!settings) return '';

  const iconChar = processFontIcon(settings);
  if (!iconChar) return '';

  const placement   = value?.icon?.placement ?? 'right';
  const pseudo      = 'left' === placement ? 'before' : 'after';
  const fontFamily  = 'fa' === settings?.type ? 'FontAwesome' : 'ETmodules';

  return `${selector}::${pseudo} { content: "${iconChar}"; font-family: ${fontFamily}; }`;
};

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

  const wrapperCss   = `${orderClass} .inftnc_button_wrapper { justify-content: ${alignment}; gap: ${gap}; }`;
  const leftIconCss  = buildIconContentCss(leftBtnDecButton,  `${orderClass} .inftnc_pb_button_left`);
  const rightIconCss = buildIconContentCss(rightBtnDecButton, `${orderClass} .inftnc_pb_button_right`);

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

      {/* Left button decoration (colors, border, font) + margin/line-height for icon */}
      {(elements as any).style({
        attrName: 'buttonLeft',
        styleProps: {
          advancedStyles: [
            {
              componentName: 'divi/common',
              props: {
                selector:            `${orderClass} .inftnc_pb_button_left::${leftPseudo}`,
                attr:                leftBtnDecButton,
                declarationFunction: buttonIconStyleDeclaration,
              },
            },
            {
              componentName: 'divi/common',
              props: {
                selector:            `${orderClass} .inftnc_pb_button_left`,
                attr:                leftBtnDecButton,
                declarationFunction: buttonSpacingDeclaration,
              },
            },
          ],
        },
      })}

      {/* Right button decoration + icon positioning */}
      {(elements as any).style({
        attrName: 'buttonRight',
        styleProps: {
          advancedStyles: [
            {
              componentName: 'divi/common',
              props: {
                selector:            `${orderClass} .inftnc_pb_button_right::${rightPseudo}`,
                attr:                rightBtnDecButton,
                declarationFunction: buttonIconStyleDeclaration,
              },
            },
            {
              componentName: 'divi/common',
              props: {
                selector:            `${orderClass} .inftnc_pb_button_right`,
                attr:                rightBtnDecButton,
                declarationFunction: buttonSpacingDeclaration,
              },
            },
          ],
        },
      })}

      {/* Wrapper layout */}
      <style>{wrapperCss}</style>

      {/* Icon content + font-family (explicit, not relying on style_components) */}
      {leftIconCss  ? <style>{leftIconCss}</style>  : null}
      {rightIconCss ? <style>{rightIconCss}</style> : null}

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

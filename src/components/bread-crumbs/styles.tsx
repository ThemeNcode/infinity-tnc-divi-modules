/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { ReactElement } from 'react';

import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';

import { BreadCrumbsAttrs } from './types';
import { cssFields } from './custom-css';


const ModuleStyles = ({
  attrs,
  settings,
  orderClass,
  mode,
  state,
  noStyleTag,
  elements,
}: StylesProps<BreadCrumbsAttrs>): ReactElement => {
  const breadCrumbsData = attrs?.breadCrumbsData?.innerContent?.desktop?.value || {};

  const colorCss = [
    breadCrumbsData.link_color          ? `${orderClass} a { color: ${breadCrumbsData.link_color}; }` : '',
    breadCrumbsData.seperate_icon_color ? `${orderClass} .inftnc_separator { color: ${breadCrumbsData.seperate_icon_color}; }` : '',
    breadCrumbsData.current_text_color  ? `${orderClass} .inftnc_current { color: ${breadCrumbsData.current_text_color}; }` : '',
    breadCrumbsData.before_text_color   ? `${orderClass} .inftnc_before { color: ${breadCrumbsData.before_text_color}; }` : '',
  ].filter(Boolean).join('\n');

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
      {(elements as any).style({ attrName: 'breadcrumbText' })}
      {colorCss ? <style>{colorCss}</style> : null}
      <CssStyle
        selector={orderClass}
        attr={attrs?.css as any}
        cssFields={cssFields}
      />
    </StyleContainer>
  );
};

export {
  ModuleStyles,
};

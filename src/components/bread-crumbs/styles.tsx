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

    breadCrumbsData.link_color ? `${orderClass} a { color: ${breadCrumbsData.link_color} !important; }` : '',
    breadCrumbsData.seperate_icon_color ? `${orderClass} .inftnc_separator, ${orderClass} .inftnc_before_icon { color: ${breadCrumbsData.seperate_icon_color}; }` : '',
    breadCrumbsData.current_text_color ? `${orderClass} .inftnc_current { color: ${breadCrumbsData.current_text_color} !important; }` : '',
    breadCrumbsData.before_text_color ? `${orderClass} .inftnc_before { color: ${breadCrumbsData.before_text_color} !important; }` : '',
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
      <style>{`${orderClass} .inftnc_separator.et-pb-icon, ${orderClass} .inftnc_before_icon.et-pb-icon { font-family: 'ETmodules' !important; }`}</style>
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

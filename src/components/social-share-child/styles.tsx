import React, { ReactElement } from 'react';
import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';
import { getAttrByMode } from '@divi/module-utils';

import { SocialShareChildAttrs, SocialShareChildInnerContent } from './types';
import { SocialShareAttrs } from '../social-share/types';
import { cssFields } from './custom-css';

export const ModuleStyles = ({
  attrs,
  parentAttrs,
  elements,
  settings,
  orderClass,
  mode,
  state,
  noStyleTag,
}: StylesProps<SocialShareChildAttrs, SocialShareAttrs>): ReactElement => {
  // Use getAttrByMode so the VB live-preview reacts to breakpoint/state changes.
  const data: SocialShareChildInnerContent = (getAttrByMode(attrs?.socialShareChildData?.innerContent) ?? {}) as SocialShareChildInnerContent;

  const lines: string[] = [];

  lines.push(`${orderClass} .inftnc_share_button { width: 100%; }`);
  lines.push(`${orderClass}.inftnc_social_share_child { margin-bottom: 0 !important; }`);

  if (data.button_color_child) {
    lines.push(`${orderClass} .inftnc_share_link { background-color: ${data.button_color_child} !important; }`);
  }

  if (data.icon_color_child) {
    lines.push(`${orderClass} .inftnc_social_icon { color: ${data.icon_color_child} !important; }`);
  }

  if (data.icon_size_child) {
    lines.push(`${orderClass} .inftnc_social_icon { font-size: ${data.icon_size_child} !important; }`);
  }

  const pTop    = data.button_padding_child_top;
  const pRight  = data.button_padding_child_right;
  const pBottom = data.button_padding_child_bottom;
  const pLeft   = data.button_padding_child_left;
  if (pTop || pRight || pBottom || pLeft) {
    lines.push(`${orderClass} .inftnc_share_link { padding: ${pTop || '0'} ${pRight || '0'} ${pBottom || '0'} ${pLeft || '0'} !important; }`);
  }

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
      {elements.style({
        attrName: 'buttonText',
      })}
      {lines.length > 0 ? <style>{lines.join('\n')}</style> : null}
      <CssStyle
        selector={orderClass}
        attr={attrs?.css}
        cssFields={cssFields}
      />
    </StyleContainer>
  );
};

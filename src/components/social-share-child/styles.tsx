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
    // `.inftnc_share_button` lifts this to specificity 0,3,0 — one class above the
    // parent Social Share module's 0,2,0 `.inftnc_share_link` rule — so the child's
    // own background always wins. Mirrors the front-end (SocialShareChild
    // ModuleStylesTrait), which emits the same selector.
    lines.push(`${orderClass} .inftnc_share_button .inftnc_share_link { background-color: ${data.button_color_child} !important; }`);
  }

  if (data.icon_color_child) {
    lines.push(`${orderClass} .inftnc_social_icon { color: ${data.icon_color_child} !important; }`);
  }

  if (data.icon_size_child) {
    // Add .inftnc_share_link so the child rule reaches specificity 0,4,0 — one class
    // higher than the parent's 0,3,0 icon-size rule — so a per-network icon size always
    // overrides the parent default, regardless of stylesheet source order in the VB.
    lines.push(`${orderClass} .inftnc_share_button .inftnc_share_link .inftnc_social_icon { font-size: ${data.icon_size_child} !important; }`);
  }

  const pTop    = data.button_padding_child_top;
  const pRight  = data.button_padding_child_right;
  const pBottom = data.button_padding_child_bottom;
  const pLeft   = data.button_padding_child_left;
  if (pTop || pRight || pBottom || pLeft) {
    // Same 0,3,0 specificity lift as above: the parent module emits its group padding
    // as `${parentOrderClass} .inftnc_share_link { padding: ... !important }` (0,2,0).
    // With equal specificity and both !important the parent would win on source order,
    // which is why per-button padding worked on the front end but not in the VB.
    lines.push(`${orderClass} .inftnc_share_button .inftnc_share_link { padding: ${pTop || '0'} ${pRight || '0'} ${pBottom || '0'} ${pLeft || '0'} !important; }`);
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

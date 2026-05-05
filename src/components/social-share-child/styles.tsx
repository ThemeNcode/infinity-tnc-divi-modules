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

  if (data.button_padding_child) {
    let paddingValue = '';
    if (typeof data.button_padding_child === 'string') {
      const parts = data.button_padding_child.split('|');
      if (parts.length === 4) {
        paddingValue = `${parts[0]} ${parts[1]} ${parts[2]} ${parts[3]}`;
      } else {
        paddingValue = data.button_padding_child;
      }
    } else if (typeof data.button_padding_child === 'object' && data.button_padding_child !== null) {
      const p = data.button_padding_child as any;
      const extract = (v: any) => {
        if (!v && v !== 0) return '0px';
        let out = v;
        if (typeof out === 'object' && out !== null) {
          out = out.padding ?? out.margin ?? out.value ?? out;
          if (typeof out === 'object' && out !== null) {
            out = out.desktop?.value ?? out.value ?? out;
          }
        }
        if (out === undefined || out === null || out === '' || typeof out === 'object') return '0px';
        return /^\d+$/.test(String(out)) ? `${out}px` : String(out);
      };
      
      const t = extract(p.top || p['margin-top'] || p['padding-top'] || p.padding?.top || p[0]);
      const r = extract(p.right || p['margin-right'] || p['padding-right'] || p.padding?.right || p[1]);
      const b = extract(p.bottom || p['margin-bottom'] || p['padding-bottom'] || p.padding?.bottom || p[2]);
      const l = extract(p.left || p['margin-left'] || p['padding-left'] || p.padding?.left || p[3]);
      
      paddingValue = `${t} ${r} ${b} ${l}`;
    }

    if (paddingValue) {
      lines.push(`${orderClass} .inftnc_share_link { padding: ${paddingValue} !important; }`);
    }
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

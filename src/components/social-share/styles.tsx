import React, { ReactElement } from 'react';
import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';
import { getAttrByMode } from '@divi/module-utils';

import { SocialShareAttrs, SocialShareInnerContent } from './types';
import { cssFields } from './custom-css';

const COLUMN_TEMPLATES: Record<string, string> = {
  column_auto:  'repeat(auto-fill, minmax(200px, 1fr))',
  column_one:   'repeat(1, 1fr)',
  column_two:   'repeat(2, 1fr)',
  column_three: 'repeat(3, 1fr)',
  column_four:  'repeat(4, 1fr)',
  column_five:  'repeat(5, 1fr)',
  column_six:   'repeat(6, 1fr)',
};

export const ModuleStyles = ({
  attrs,
  elements,
  settings,
  orderClass,
  mode,
  state,
  noStyleTag,
}: StylesProps<SocialShareAttrs>): ReactElement => {
  // Use getAttrByMode so the VB live-preview reacts to breakpoint/state changes.
  const data: SocialShareInnerContent = (getAttrByMode(attrs?.socialShareData?.innerContent) ?? {}) as SocialShareInnerContent;

  let columns       = data.columns ?? 'column_auto';
  let buttonLayout  = data.button_layout ?? 'icon_with_text';
  let buttonShape   = data.button_shape ?? 'button_square';

  // divi/select inside group-items can store a numeric index (number or numeric string) — resolve to string value.
  const columnsKeys = [ 'column_auto', 'column_one', 'column_two', 'column_three', 'column_four', 'column_five', 'column_six' ];
  if (typeof columns === 'number' || (typeof columns === 'string' && /^\d+$/.test(columns))) {
    columns = columnsKeys[parseInt(String(columns), 10)] ?? 'column_auto';
  }

  const buttonLayoutKeys = [ 'icon_with_text', 'only_icon', 'only_text' ];
  if (typeof buttonLayout === 'number' || (typeof buttonLayout === 'string' && /^\d+$/.test(buttonLayout))) {
    buttonLayout = buttonLayoutKeys[parseInt(String(buttonLayout), 10)] ?? 'icon_with_text';
  }

  const buttonShapeKeys = [ 'button_square', 'button_rounded', 'button_circle' ];
  if (typeof buttonShape === 'number' || (typeof buttonShape === 'string' && /^\d+$/.test(buttonShape))) {
    buttonShape = buttonShapeKeys[parseInt(String(buttonShape), 10)] ?? 'button_square';
  }

  const columnsCss    = COLUMN_TEMPLATES[columns] ?? COLUMN_TEMPLATES.column_auto;
  const columnsGap    = data.columns_gap ?? '10px';
  const rowGap        = data.row_gap ?? '10px';
  const onlyIcon      = buttonLayout === 'only_icon';
  const onlyText      = buttonLayout === 'only_text';
  const isCircle      = buttonShape === 'button_circle';
  const isRounded     = buttonShape === 'button_rounded';

  const lines: string[] = [];

  if (columns === 'column_auto' && onlyIcon && isCircle) {
    lines.push(`${orderClass} .inftnc_social_share_wrapper { display: flex; flex-direction: row; flex-wrap: wrap; column-gap: ${columnsGap}; row-gap: ${rowGap}; }`);
  } else {
    lines.push(`${orderClass} .inftnc_social_share_wrapper { display: grid; grid-template-columns: ${columnsCss}; column-gap: ${columnsGap}; row-gap: ${rowGap}; }`);
  }

  if (data.button_bg) {
    lines.push(`${orderClass} .inftnc_share_link { background-color: ${data.button_bg}; }`);
  }

  if (isCircle && onlyIcon) {
    lines.push(`${orderClass} .inftnc_share_link { border-radius: 50% !important; aspect-ratio: 1/1 !important; padding: 10px !important; display: inline-flex !important; justify-content: center !important; align-items: center !important; width: auto !important; }`);
    lines.push(`${orderClass} .inftnc_social_icon { margin-left: 0 !important; }`);
  } else if (isCircle) {
    lines.push(`${orderClass} .inftnc_share_link { border-radius: 30px; }`);
  } else if (isRounded) {
    lines.push(`${orderClass} .inftnc_share_link { border-radius: 10px; }`);
  } else {
    lines.push(`${orderClass} .inftnc_share_link { border-radius: 0; }`);
  }

  if (onlyIcon) {
    lines.push(`${orderClass} .inftnc_social_text { display: none; }`);
    if (!isCircle) {
      lines.push(`${orderClass} .inftnc_share_link { justify-content: center; }`);
    }
  }

  if (onlyText) {
    lines.push(`${orderClass} .inftnc_social_icon { display: none; }`);
  }

  if (data.icon_color) {
    lines.push(`${orderClass} .inftnc_social_icon { color: ${data.icon_color}; }`);
  }

  if (data.icon_size) {
    // Use .inftnc_share_button (specificity 0,3,0) + !important to beat the base
    // VB stylesheet rule `.inftnc_fb_share_link .inftnc_social_icon { font-size: 16px }`.
    lines.push(`${orderClass} .inftnc_share_button .inftnc_social_icon { font-size: ${data.icon_size} !important; }`);
  }

  if (!(isCircle && onlyIcon)) {
    const pTop    = data.button_padding_top;
    const pRight  = data.button_padding_right;
    const pBottom = data.button_padding_bottom;
    const pLeft   = data.button_padding_left;
    if (pTop || pRight || pBottom || pLeft) {
      lines.push(`${orderClass} .inftnc_share_link { padding: ${pTop || '0'} ${pRight || '0'} ${pBottom || '0'} ${pLeft || '0'} !important; }`);
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

import React, { ReactElement } from 'react';
import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';

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
  const data: SocialShareInnerContent = attrs?.socialShareData?.innerContent?.desktop?.value ?? {};

  const columns       = data.columns ?? 'column_auto';
  const columnsCss    = COLUMN_TEMPLATES[columns] ?? COLUMN_TEMPLATES.column_auto;
  const columnsGap    = data.columns_gap ?? '10px';
  const rowGap        = data.row_gap ?? '10px';
  const buttonLayout  = data.button_layout ?? 'icon_with_text';
  const buttonShape   = data.button_shape ?? 'button_square';
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
    lines.push(`${orderClass} .inftnc_share_link { border-radius: 100px; width: 45px; padding: 10px; text-align: center; }`);
    lines.push(`${orderClass} .inftnc_social_icon { margin-left: 0; }`);
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
    lines.push(`${orderClass} .inftnc_social_icon { font-size: ${data.icon_size}; }`);
  }

  if (data.button_padding) {
    const parts = String(data.button_padding).split('|');
    if (parts.length === 4) {
      lines.push(`${orderClass} .inftnc_share_link { padding: ${parts[0]} ${parts[1]} ${parts[2]} ${parts[3]}; }`);
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

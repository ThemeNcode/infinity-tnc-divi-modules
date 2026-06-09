import React, { ReactElement } from 'react';
import { ChildModulesContainer, ModuleContainer } from '@divi/module';
import { getAttrByMode } from '@divi/module-utils';

import { SocialShareEditProps } from './types';
import { ModuleStyles } from './styles';
import { ModuleScriptData } from './module-script-data';
import { moduleClassnames } from './module-classnames';

const buttonLayoutKeys = ['icon_with_text', 'only_icon', 'only_text'];
const buttonShapeKeys  = ['button_square', 'button_rounded', 'button_circle'];

function resolveSelect(val: string | number | undefined, keys: string[], fallback: string): string {
  if (val == null) return fallback;
  if (typeof val === 'number' || /^\d+$/.test(String(val))) {
    return keys[parseInt(String(val), 10)] ?? fallback;
  }
  return String(val);
}

export const SocialShareEdit = (props: SocialShareEditProps): ReactElement => {
  const {
    attrs,
    elements,
    id,
    name,
    childrenIds,
  } = props;

  const data = (getAttrByMode((attrs as any)?.socialShareData?.innerContent) ?? {}) as {
    button_layout?:         string | number;
    button_shape?:          string | number;
    button_bg?:             string;
    icon_color?:            string;
    icon_size?:             string;
    button_padding_top?:    string;
    button_padding_right?:  string;
    button_padding_bottom?: string;
    button_padding_left?:   string;
  };

  const buttonLayout = resolveSelect(data.button_layout, buttonLayoutKeys, 'icon_with_text');
  const buttonShape  = resolveSelect(data.button_shape,  buttonShapeKeys,  'button_square');

  const isCircle   = buttonShape  === 'button_circle';
  const isRounded  = buttonShape  === 'button_rounded';
  const onlyIcon   = buttonLayout === 'only_icon';
  const onlyText   = buttonLayout === 'only_text';
  const circleIcon = isCircle && onlyIcon;

  // Unique wrapper ID so styles are scoped per module instance in the VB.
  const scopeClass = `inftnc-ss-scope-${id}`;
  const scope      = `.${scopeClass}`;

  const cssLines: string[] = [];

  // Button background.
  if (data.button_bg) {
    cssLines.push(`${scope} .inftnc_share_link { background-color: ${data.button_bg}; }`);
  }

  // Button shape.
  if (circleIcon) {
    cssLines.push(`${scope} .inftnc_share_link { border-radius: 50% !important; aspect-ratio: 1/1 !important; padding: 10px !important; display: inline-flex !important; justify-content: center !important; align-items: center !important; width: auto !important; }`);
    cssLines.push(`${scope} .inftnc_social_icon { margin-left: 0 !important; }`);
  } else if (isCircle) {
    cssLines.push(`${scope} .inftnc_share_link { border-radius: 30px; }`);
  } else if (isRounded) {
    cssLines.push(`${scope} .inftnc_share_link { border-radius: 10px; }`);
  } else {
    cssLines.push(`${scope} .inftnc_share_link { border-radius: 0; }`);
  }

  // Only icon / only text visibility.
  if (onlyIcon) {
    cssLines.push(`${scope} .inftnc_social_text { display: none; }`);
    if (!isCircle) {
      cssLines.push(`${scope} .inftnc_share_link { justify-content: center; }`);
    }
  }
  if (onlyText) {
    cssLines.push(`${scope} .inftnc_social_icon { display: none; }`);
  }

  // Icon color.
  if (data.icon_color) {
    cssLines.push(`${scope} .inftnc_social_icon { color: ${data.icon_color}; }`);
  }

  // Icon size — use .inftnc_share_button to reach specificity 0,3,0, beating child's
  // old 0,2,0 default rule regardless of stylesheet order.
  if (data.icon_size) {
    cssLines.push(`${scope} .inftnc_share_button .inftnc_social_icon { font-size: ${data.icon_size} !important; }`);
  }

  // Button padding (skipped for circle+icon-only).
  if (!circleIcon) {
    const pt = data.button_padding_top;
    const pr = data.button_padding_right;
    const pb = data.button_padding_bottom;
    const pl = data.button_padding_left;
    if (pt || pr || pb || pl) {
      cssLines.push(`${scope} .inftnc_share_link { padding: ${pt || '0'} ${pr || '0'} ${pb || '0'} ${pl || '0'} !important; }`);
    }
  }

  return (
    <ModuleContainer
      attrs={attrs}
      elements={elements}
      id={id}
      name={name}
      stylesComponent={ModuleStyles as any}
      scriptDataComponent={ModuleScriptData as any}
      classnamesFunction={moduleClassnames as any}
    >
      {elements?.styleComponents({
        attrName: 'module',
      })}
      <div className={`inftnc_social_share_wrapper ${scopeClass}`}>
        <ChildModulesContainer ids={childrenIds ?? []} />
      </div>
      {cssLines.length > 0 && (
        <style>{cssLines.join('\n')}</style>
      )}
    </ModuleContainer>
  );
};

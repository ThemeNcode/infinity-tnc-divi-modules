/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { ReactElement } from 'react';
import { isNil } from 'lodash';
import { processFontIcon } from '@divi/icon-library';
import { ModuleContainer } from '@divi/module';

import { DualButtonEditProps } from './types';
import { ModuleStyles } from './styles';

/** Convert camelCase breakpoint to kebab-case data attribute name. */
const breakpointToDataAttr = (breakpoint: string): string => {
  if ('desktop' === breakpoint) return 'data-icon';
  return `data-icon-${breakpoint.replace(/([A-Z])/g, '-$1').toLowerCase()}`;
};

/** Build data-icon-* attrs map from a button decoration attribute. */
const buildIconDataAttrs = (buttonDecoration: any): Record<string, string | null> => {
  const iconDataAttrs: Record<string, string | null> = {};
  if (!buttonDecoration) return iconDataAttrs;

  const desktopValue  = buttonDecoration?.desktop?.value ?? {};
  const hasCustom     = 'on' === desktopValue?.enable;
  const isIconEnabled = 'on' === desktopValue?.icon?.enable;

  if (!hasCustom || !isIconEnabled) return iconDataAttrs;

  Object.keys(buttonDecoration).forEach(breakpoint => {
    const bpValue      = (buttonDecoration as any)[breakpoint];
    const iconSettings = bpValue?.value?.icon?.settings;
    if (!isNil(iconSettings) && iconSettings) {
      iconDataAttrs[breakpointToDataAttr(breakpoint)] = processFontIcon(iconSettings);
    }
  });

  return iconDataAttrs;
};

const DualButtonEdit = ({
  attrs,
  defaultPrintedStyleAttrs,
  id,
  isFirst,
  isLast,
  name,
  elements,
}: DualButtonEditProps): ReactElement => {
  const data        = attrs?.dualButtonData?.innerContent?.desktop?.value || {};
  const alignment   = data.button_alignment || 'flex-start';
  const gap         = data.button_gap || '10px';

  const leftContent  = attrs?.buttonLeft?.innerContent?.desktop?.value || {};
  const rightContent = attrs?.buttonRight?.innerContent?.desktop?.value || {};

  const leftText    = leftContent.text    || 'Left Button';
  const leftUrl     = leftContent.linkUrl || '#';
  const leftTarget  = 'on' === leftContent.linkTarget ? '_blank' : undefined;

  const rightText   = rightContent.text    || 'Right Button';
  const rightUrl    = rightContent.linkUrl || '#';
  const rightTarget = 'on' === rightContent.linkTarget ? '_blank' : undefined;

  const leftIconAttrs  = buildIconDataAttrs(attrs?.buttonLeft?.decoration?.button);
  const rightIconAttrs = buildIconDataAttrs(attrs?.buttonRight?.decoration?.button);

  return (
    <ModuleContainer
      attrs={attrs}
      defaultPrintedStyleAttrs={defaultPrintedStyleAttrs}
      elements={elements}
      id={id}
      isFirst={isFirst}
      isLast={isLast}
      name={name}
      stylesComponent={ModuleStyles}
      tag="div"
    >
      <div
        className="inftnc_button_wrapper et_pb_button_module_wrapper"
        style={{ display: 'flex', flexWrap: 'wrap', justifyContent: alignment, gap }}
      >
        {(elements as any).styleComponents({ attrName: 'buttonLeft' })}
        <a
          className="et_pb_button inftnc_pb_button_left et_pb_bg_layout_light"
          href={leftUrl}
          target={leftTarget}
          rel={leftTarget ? 'noopener noreferrer' : undefined}
          {...leftIconAttrs}
        >
          {leftText}
        </a>
        {(elements as any).styleComponents({ attrName: 'buttonRight' })}
        <a
          className="et_pb_button inftnc_pb_button_right et_pb_bg_layout_light"
          href={rightUrl}
          target={rightTarget}
          rel={rightTarget ? 'noopener noreferrer' : undefined}
          {...rightIconAttrs}
        >
          {rightText}
        </a>
      </div>
    </ModuleContainer>
  );
};

export { DualButtonEdit };

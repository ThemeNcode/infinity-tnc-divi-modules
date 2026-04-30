/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { ReactElement } from 'react';
import { isNil } from 'lodash';
import { processFontIcon } from '@divi/icon-library';
import { ModuleContainer } from '@divi/module';

import { DualButtonEditProps } from './types';
import { ModuleStyles } from './styles';

/** Build data-icon-* attribute map from a button decoration object. */
const buildIconDataAttrs = (decoration: any): Record<string, string | null> => {
  const btnDec = decoration?.button;
  if (!btnDec) return {};

  const hasCustomButton = 'on' === (btnDec?.desktop?.value?.enable ?? 'off');
  const isIconEnabled   = 'on' === (btnDec?.desktop?.value?.icon?.enable ?? 'off');

  if (!hasCustomButton || !isIconEnabled) return {};

  const breakpointToDataAttr = (bp: string): string => {
    if ('desktop' === bp) return 'data-icon';
    return `data-icon-${bp.replace(/([A-Z])/g, '-$1').toLowerCase()}`;
  };

  const result: Record<string, string | null> = {};
  Object.keys(btnDec).forEach(bp => {
    const iconSettings = (btnDec as any)[bp]?.value?.icon?.settings;
    if (!isNil(iconSettings) && iconSettings) {
      result[breakpointToDataAttr(bp)] = processFontIcon(iconSettings as any);
    }
  });

  return result;
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
  const data      = attrs?.dualButtonData?.innerContent?.desktop?.value || {};
  const alignment = data.button_alignment || 'left';
  const gap       = data.button_gap || '10px';

  const leftContent  = attrs?.buttonLeft?.innerContent?.desktop?.value  || {};
  const rightContent = attrs?.buttonRight?.innerContent?.desktop?.value || {};

  const leftText   = leftContent.text    || 'Left Button';
  const leftUrl    = leftContent.linkUrl || '#';
  const leftTarget = 'on' === leftContent.linkTarget ? '_blank' : undefined;

  const rightText   = rightContent.text    || 'Right Button';
  const rightUrl    = rightContent.linkUrl || '#';
  const rightTarget = 'on' === rightContent.linkTarget ? '_blank' : undefined;

  const leftIconDataAttrs  = buildIconDataAttrs(attrs?.buttonLeft?.decoration  as any);
  const rightIconDataAttrs = buildIconDataAttrs(attrs?.buttonRight?.decoration as any);

  return (
    <ModuleContainer
      attrs={attrs}
      defaultPrintedStyleAttrs={defaultPrintedStyleAttrs}
      elements={elements}
      id={id}
      isFirst={isFirst}
      isLast={isLast}
      name={name}
      stylesComponent={ModuleStyles as any}
      tag="div"
    >
      <div
        className="inftnc_button_wrapper et_pb_button_module_wrapper"
        style={{ display: 'flex', flexWrap: 'wrap', justifyContent: alignment, gap }}
      >
        {/* Left button */}
        <a
          className="et_pb_button inftnc_pb_button_left et_pb_bg_layout_light"
          href={leftUrl}
          target={leftTarget}
          rel={leftTarget ? 'noopener noreferrer' : undefined}
          {...leftIconDataAttrs}
        >
          {(elements as any).styleComponents({ attrName: 'buttonLeft' })}
          {leftText}
        </a>

        {/* Right button */}
        <a
          className="et_pb_button inftnc_pb_button_right et_pb_bg_layout_light"
          href={rightUrl}
          target={rightTarget}
          rel={rightTarget ? 'noopener noreferrer' : undefined}
          {...rightIconDataAttrs}
        >
          {(elements as any).styleComponents({ attrName: 'buttonRight' })}
          {rightText}
        </a>
      </div>
    </ModuleContainer>
  );
};

export { DualButtonEdit };

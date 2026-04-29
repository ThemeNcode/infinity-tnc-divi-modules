/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { ReactElement } from 'react';
import { ModuleContainer } from '@divi/module';

import { DualButtonEditProps } from './types';
import { ModuleStyles } from './styles';

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
        >
          {leftText}
        </a>
        {(elements as any).styleComponents({ attrName: 'buttonRight' })}
        <a
          className="et_pb_button inftnc_pb_button_right et_pb_bg_layout_light"
          href={rightUrl}
          target={rightTarget}
          rel={rightTarget ? 'noopener noreferrer' : undefined}
        >
          {rightText}
        </a>
      </div>
    </ModuleContainer>
  );
};

export { DualButtonEdit };

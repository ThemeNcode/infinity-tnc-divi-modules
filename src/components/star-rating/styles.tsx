/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { ReactElement } from 'react';
import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';

import { StarRatingAttrs } from './types';
import { cssFields } from './custom-css';

const ModuleStyles = ({
  attrs,
  settings,
  orderClass,
  mode,
  state,
  noStyleTag,
  elements,
}: StylesProps<StarRatingAttrs>): ReactElement => {
  const data        = attrs?.starRatingData?.innerContent?.desktop?.value || {};
  const gap         = parseInt(data.gap || '0', 10);
  const alignment   = data.star_alignment || 'left';

  const gapCss = gap > 0
    ? `${orderClass} .jq-star { margin-left: ${gap}px !important; }
${orderClass} .jq-star:first-child { margin-left: 0 !important; }`
    : '';

  const alignmentMap: Record<string, string> = {
    left:   'flex-start',
    center: 'center',
    right:  'flex-end',
  };
  const justifyContent = alignmentMap[alignment] || 'flex-start';
  const alignmentCss   = `${orderClass} .inftnc_rating_inner_wrapper { justify-content: ${justifyContent}; }`;

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
      {(elements as any).style({ attrName: 'ratingNumber' })}
      <style>{alignmentCss}</style>
      {gapCss ? <style>{gapCss}</style> : null}
      <CssStyle
        selector={orderClass}
        attr={attrs?.css as any}
        cssFields={cssFields}
      />
    </StyleContainer>
  );
};

export { ModuleStyles };

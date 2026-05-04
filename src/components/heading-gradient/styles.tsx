import React, { ReactElement } from 'react';
import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';
import { HeadingGradientAttrs } from './types';
import { cssFields } from './custom-css';

// Map underscore keys back to CSS direction/position values
const positionMap: Record<string, string> = {
  top_left:      'top left',
  top:           'top',
  top_right:     'top right',
  right:         'right',
  bottom_right:  'bottom right',
  bottom:        'bottom',
  bottom_left:   'bottom left',
  left:          'left',
  top_center:    'top center',
  left_center:   'left center',
  center_center: 'center center',
  right_center:  'right center',
  bottom_center: 'bottom center',
};

/**
 * Heading Gradient module's style components.
 *
 * @since ??
 */
const ModuleStyles = ({
  attrs,
  settings,
  orderClass,
  mode,
  state,
  noStyleTag,
  elements,
}: StylesProps<HeadingGradientAttrs>): ReactElement => {
  const data = attrs?.headingGradientData?.innerContent?.desktop?.value || {};

  const {
    gradient_options  = 'gradient_custom_color',
    gradient_type     = 'linear_gradient',
    linear_position   = 'right',
    radial_position   = 'center center',
    ellipse_position  = 'center center',
    start_color       = '#481CA6',
    end_color         = '#AC43D9',
    start_position    = 0,
    end_position      = 100,
    presets_gradient  = 'gradient_preset1',
  } = data;

  // Resolve underscore keys to CSS values
  const linearPosCSS  = positionMap[linear_position]  ?? linear_position;
  const radialPosCSS  = positionMap[radial_position]  ?? radial_position;
  const ellipsePosCSS = positionMap[ellipse_position] ?? ellipse_position;

  let gradientDeclaration = '';

  if (gradient_options === 'gradient_custom_color') {
    if (gradient_type === 'linear_gradient') {
      gradientDeclaration = `background: -webkit-linear-gradient(${linearPosCSS}, ${start_color} ${start_position}%, ${end_color} ${end_position}%) !important;`;
    } else if (gradient_type === 'radial_gradient') {
      gradientDeclaration = `background: radial-gradient(circle farthest-corner at ${radialPosCSS}, ${start_color} ${start_position}%, ${end_color} ${end_position}%) !important;`;
    } else if (gradient_type === 'ellipse') {
      gradientDeclaration = `background: radial-gradient(ellipse farthest-corner at ${ellipsePosCSS}, ${start_color} ${start_position}%, ${end_color} ${end_position}%) !important;`;
    }
  } else if (gradient_options === 'gradient_preset_color') {
    const presets: Record<string, string> = {
      gradient_preset1: 'background: linear-gradient(to right, #03658C 0%, #63BBF2 100%) !important;',
      gradient_preset2: 'background: linear-gradient(to right, #F1543F 0%, #FDC362 100%) !important;',
      gradient_preset3: 'background: linear-gradient(to bottom right, #30303B 0%, #EAE9E7 100%) !important;',
      gradient_preset4: 'background: linear-gradient(to right, #8C5B49 0%, #D9BBA0 100%) !important;',
      gradient_preset5: 'background: linear-gradient(to right, #044D29 0%, #97ED8A 100%) !important;',
      gradient_preset6: 'background: linear-gradient(to right, #481CA6 0%, #AC43D9 100%) !important;',
    };
    gradientDeclaration = presets[presets_gradient] ?? presets.gradient_preset1;
  }

  const gradientTargets = [1,2,3,4,5,6].map(n => `${orderClass} h${n}.inftnc_gradient_title`).join(', ');
  const gradientCss = gradientDeclaration ? `
    ${gradientTargets} {
      ${gradientDeclaration}
      -webkit-background-clip: text !important;
      -webkit-text-fill-color: transparent !important;
    }
  ` : '';

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
        attrName: 'title',
      })}
      {gradientCss && <style>{gradientCss}</style>}
      <CssStyle
        selector={orderClass}
        attr={attrs?.css}
        cssFields={cssFields}
      />
    </StyleContainer>
  );
};

export { ModuleStyles };

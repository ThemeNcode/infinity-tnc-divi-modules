import React, { type ReactElement } from 'react';

import { set } from 'lodash';
import { ModuleGroups } from '@divi/module';
import { Module } from '@divi/types';
import { HeadingGradientAttrs } from './types';

export const SettingsContent = ({
  attrs,
  groupConfiguration,
}: Module.Settings.Panel.Props<HeadingGradientAttrs>): ReactElement => {

  const showCustom = (params: Module.Settings.Field.CallbackParams<HeadingGradientAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const val = fieldAttrs?.headingGradientData?.innerContent?.desktop?.value?.gradient_options;
    const current = (val && typeof val === 'string') ? val : 'gradient_custom_color';
    return current === 'gradient_custom_color';
  };

  const showPreset = (params: Module.Settings.Field.CallbackParams<HeadingGradientAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const val = fieldAttrs?.headingGradientData?.innerContent?.desktop?.value?.gradient_options;
    const current = (val && typeof val === 'string') ? val : 'gradient_custom_color';
    return current === 'gradient_preset_color';
  };

  const showLinearPos = (params: Module.Settings.Field.CallbackParams<HeadingGradientAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const d = fieldAttrs?.headingGradientData?.innerContent?.desktop?.value || {};
    const gradOptions = (d.gradient_options && typeof d.gradient_options === 'string') ? d.gradient_options : 'gradient_custom_color';
    const gradType = (d.gradient_type && typeof d.gradient_type === 'string') ? d.gradient_type : 'linear_gradient';
    return gradOptions === 'gradient_custom_color' && gradType === 'linear_gradient';
  };

  const showRadialPos = (params: Module.Settings.Field.CallbackParams<HeadingGradientAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const d = fieldAttrs?.headingGradientData?.innerContent?.desktop?.value || {};
    const gradOptions = (d.gradient_options && typeof d.gradient_options === 'string') ? d.gradient_options : 'gradient_custom_color';
    const gradType = (d.gradient_type && typeof d.gradient_type === 'string') ? d.gradient_type : 'linear_gradient';
    return gradOptions === 'gradient_custom_color' && gradType === 'radial_gradient';
  };

  const showEllipsePos = (params: Module.Settings.Field.CallbackParams<HeadingGradientAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const d = fieldAttrs?.headingGradientData?.innerContent?.desktop?.value || {};
    const gradOptions = (d.gradient_options && typeof d.gradient_options === 'string') ? d.gradient_options : 'gradient_custom_color';
    const gradType = (d.gradient_type && typeof d.gradient_type === 'string') ? d.gradient_type : 'linear_gradient';
    return gradOptions === 'gradient_custom_color' && gradType === 'ellipse';
  };

  if (groupConfiguration?.gradientStyleHeadingGradient?.component?.props) {
    set(groupConfiguration, ['gradientStyleHeadingGradient', 'component', 'props', 'fields', 'gradient_type',    'visible'], showCustom);
    set(groupConfiguration, ['gradientStyleHeadingGradient', 'component', 'props', 'fields', 'start_color',      'visible'], showCustom);
    set(groupConfiguration, ['gradientStyleHeadingGradient', 'component', 'props', 'fields', 'end_color',        'visible'], showCustom);
    set(groupConfiguration, ['gradientStyleHeadingGradient', 'component', 'props', 'fields', 'start_position',   'visible'], showCustom);
    set(groupConfiguration, ['gradientStyleHeadingGradient', 'component', 'props', 'fields', 'end_position',     'visible'], showCustom);
    set(groupConfiguration, ['gradientStyleHeadingGradient', 'component', 'props', 'fields', 'presets_gradient', 'visible'], showPreset);
    set(groupConfiguration, ['gradientStyleHeadingGradient', 'component', 'props', 'fields', 'linear_position',  'visible'], showLinearPos);
    set(groupConfiguration, ['gradientStyleHeadingGradient', 'component', 'props', 'fields', 'radial_position',  'visible'], showRadialPos);
    set(groupConfiguration, ['gradientStyleHeadingGradient', 'component', 'props', 'fields', 'ellipse_position', 'visible'], showEllipsePos);
  }

  return <ModuleGroups groups={groupConfiguration} />;
};

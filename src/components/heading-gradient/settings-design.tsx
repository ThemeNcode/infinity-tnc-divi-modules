import React, { type ReactElement } from 'react';
import { ModuleGroups } from '@divi/module';
import { Module } from '@divi/types';
import { HeadingGradientAttrs } from './types';

/**
 * Heading Gradient design settings component wrapper.
 *
 * @param {Module.Settings.Panel.Props<HeadingGradientAttrs>} props The component props.
 *
 * @returns {ReactElement}
 */
export const SettingsDesign = ({
  groupConfiguration,
}: Module.Settings.Panel.Props<HeadingGradientAttrs>): ReactElement => {
  return <ModuleGroups groups={groupConfiguration} />;
};


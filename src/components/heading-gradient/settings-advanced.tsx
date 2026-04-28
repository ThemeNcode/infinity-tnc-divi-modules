import React, { type ReactElement } from 'react';
import { ModuleGroups } from '@divi/module';
import { Module } from '@divi/types';
import { HeadingGradientAttrs } from './types';

/**
 * Heading Gradient advanced settings component.
 *
 * @param {Module.Settings.Panel.Props<HeadingGradientAttrs>} props The component props.
 *
 * @returns {ReactElement}
 */
export const SettingsAdvanced = ({
  groupConfiguration,
}: Module.Settings.Panel.Props<HeadingGradientAttrs>): ReactElement => {
  return <ModuleGroups groups={groupConfiguration} />;
};

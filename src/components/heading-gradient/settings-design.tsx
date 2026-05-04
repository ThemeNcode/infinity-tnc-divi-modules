import React, { type ReactElement } from 'react';
import { ModuleGroups } from '@divi/module';
import { Module } from '@divi/types';
import { HeadingGradientAttrs } from './types';

export const SettingsDesign = ({
  groupConfiguration,
}: Module.Settings.Panel.Props<HeadingGradientAttrs>): ReactElement => {
  return <ModuleGroups groups={groupConfiguration as any} />;
};

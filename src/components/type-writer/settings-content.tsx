import React, { type ReactElement } from 'react';
import { ModuleGroups } from '@divi/module';
import { type Module } from '@divi/types';
import { TypeWriterAttrs } from './types';

export const SettingsContent = ({ groupConfiguration }: Module.Settings.Panel.Props<TypeWriterAttrs>): ReactElement => (
  <ModuleGroups groups={groupConfiguration} />
);

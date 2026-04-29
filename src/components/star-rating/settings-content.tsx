import React, { type ReactElement } from 'react';
import { ModuleGroups } from '@divi/module';
import { type Module } from '@divi/types';
import { StarRatingAttrs } from './types';

export const SettingsContent = ({ groupConfiguration }: Module.Settings.Panel.Props<StarRatingAttrs>): ReactElement => (
  <ModuleGroups groups={groupConfiguration} />
);

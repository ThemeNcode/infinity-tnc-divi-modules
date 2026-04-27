import { ReactElement } from 'react';
import { ModuleGroups } from '@divi/module';
import { Module } from '@divi/types';
import { YoutubeEmbedAttrs } from './types';

export const SettingsAdvanced = ({
  groupConfiguration,
}: Module.Settings.Panel.Props<YoutubeEmbedAttrs>): ReactElement => (
  <ModuleGroups groups={groupConfiguration} />
);

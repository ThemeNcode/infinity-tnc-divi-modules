import React, { type ReactElement } from 'react';

import { ModuleGroups } from '@divi/module';
import { type Module } from '@divi/types';

import { EmbedMapAttrs } from './types';

/**
 * Advanced panel component for the Embed Map module settings modal.
 *
 * @since ??
 *
 * @param {Module.Settings.Panel.Props} param0 Advanced panel props.
 *
 * @returns {ReactElement}
 */
export const SettingsAdvanced = ({
  groupConfiguration,
}: Module.Settings.Panel.Props<EmbedMapAttrs>): ReactElement => {
  return <ModuleGroups groups={groupConfiguration} />;
};

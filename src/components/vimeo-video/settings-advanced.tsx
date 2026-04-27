import React, { type ReactElement } from 'react';

import { ModuleGroups } from '@divi/module';
import { type Module } from '@divi/types';

import { VimeoVideoAttrs } from './types';

/**
 * Advanced panel component for the Vimeo Video module settings modal.
 *
 * @since ??
 *
 * @param {Module.Settings.Panel.Props} param0 Advanced panel props.
 *
 * @returns {ReactElement}
 */
export const SettingsAdvanced = ({
  groupConfiguration,
}: Module.Settings.Panel.Props<VimeoVideoAttrs>): ReactElement => {
  return <ModuleGroups groups={groupConfiguration} />;
};

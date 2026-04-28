import React, { type ReactElement } from 'react';
import { set } from 'lodash';

import { ModuleGroups } from '@divi/module';
import { type Module } from '@divi/types';

import { BreadCrumbsAttrs } from './types';


export const SettingsContent = ({
  groupConfiguration,
}: Module.Settings.Panel.Props<BreadCrumbsAttrs>): ReactElement => {
  const showBeforeIconCallback = (params: Module.Settings.Field.CallbackParams<BreadCrumbsAttrs>) => {
    const { attrs } = params;
    const useBeforeIcon = attrs?.breadCrumbsData?.innerContent?.desktop?.value?.use_before_icon;
    return useBeforeIcon === 'on';
  };

  if (groupConfiguration?.iconBreadCrumbs?.component?.props) {
    set(groupConfiguration, ['iconBreadCrumbs', 'component', 'props', 'fields', 'before_text_icon', 'visible'], showBeforeIconCallback);
  }

  return <ModuleGroups groups={groupConfiguration} />;
};

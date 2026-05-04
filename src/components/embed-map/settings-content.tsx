import React, { type ReactElement } from 'react';
import { set } from 'lodash';

import { ModuleGroups } from '@divi/module';
import { getAttrValue } from '@divi/module-utils';
import { type Module } from '@divi/types';

import { EmbedMapAttrs } from './types';

/**
 * Content panel component for the Embed Map module settings modal.
 *
 * @since ??
 *
 * @param {Module.Settings.Panel.Props} param0 Content panel props.
 *
 * @returns {ReactElement}
 */
export const SettingsContent = ({
  groupConfiguration,
}: Module.Settings.Panel.Props<EmbedMapAttrs>): ReactElement => {
  const showLatLongCallback = (params: Module.Settings.Field.CallbackParams<EmbedMapAttrs>) => {
    const { attrs } = params;
    const sourceType = attrs?.sourceData?.innerContent?.desktop?.value?.sourceType;
    const current = (sourceType && typeof sourceType === 'string') ? sourceType : 'latitude_longitude';
    return current !== 'emebed_code';
  };



  const showEmbedCodeCallback = (params: Module.Settings.Field.CallbackParams<EmbedMapAttrs>) => {
    const { attrs } = params;
    const sourceType = attrs?.sourceData?.innerContent?.desktop?.value?.sourceType;
    const current = (sourceType && typeof sourceType === 'string') ? sourceType : 'latitude_longitude';
    return current === 'emebed_code';
  };

  // Insert visibility callbacks into the contentEmbedMap group configuration.
  // The field keys exactly match the `subName` keys defined in module.json's `items`.
  if (groupConfiguration?.contentEmbedMap?.component?.props) {
    set(groupConfiguration, ['contentEmbedMap', 'component', 'props', 'fields', 'latitudeLongitude', 'visible'], showLatLongCallback);
    set(groupConfiguration, ['contentEmbedMap', 'component', 'props', 'fields', 'mapZoom', 'visible'], showLatLongCallback);
    set(groupConfiguration, ['contentEmbedMap', 'component', 'props', 'fields', 'embedCode', 'visible'], showEmbedCodeCallback);
  }

  return <ModuleGroups groups={groupConfiguration} />;
};

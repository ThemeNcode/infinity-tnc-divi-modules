import React, { type ReactElement } from 'react';
import { set } from 'lodash';

import { ModuleGroups } from '@divi/module';
import { type Module } from '@divi/types';

import { VimeoVideoAttrs } from './types';

/**
 * Content panel component for the Vimeo Video module settings modal.
 *
 * @since ??
 *
 * @param {Module.Settings.Panel.Props} param0 Content panel props.
 *
 * @returns {ReactElement}
 */
export const SettingsContent = ({
  attrs,
  groupConfiguration,
}: Module.Settings.Panel.Props<VimeoVideoAttrs>): ReactElement => {
  console.log('VimeoVideo SettingsContent groupConfiguration:', groupConfiguration);

  const vimeoMethod = attrs?.vimeoVideoData?.innerContent?.desktop?.value?.vimeo_method;
  const currentMethod = (vimeoMethod && typeof vimeoMethod === 'string') ? vimeoMethod : 'vimeo_url';
  const showOptions = currentMethod !== 'embed_code';

  const showUrlCallback = (params: Module.Settings.Field.CallbackParams<VimeoVideoAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const method = fieldAttrs?.vimeoVideoData?.innerContent?.desktop?.value?.vimeo_method;
    const current = (method && typeof method === 'string') ? method : 'vimeo_url';
    return current === 'vimeo_url';
  };

  const showIdCallback = (params: Module.Settings.Field.CallbackParams<VimeoVideoAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const method = fieldAttrs?.vimeoVideoData?.innerContent?.desktop?.value?.vimeo_method;
    const current = (method && typeof method === 'string') ? method : 'vimeo_url';
    return current === 'vimeo_id';
  };

  const showEmbedCallback = (params: Module.Settings.Field.CallbackParams<VimeoVideoAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const method = fieldAttrs?.vimeoVideoData?.innerContent?.desktop?.value?.vimeo_method;
    const current = (method && typeof method === 'string') ? method : 'vimeo_url';
    return current === 'embed_code';
  };

  const showOptionsCallback = (params: Module.Settings.Field.CallbackParams<VimeoVideoAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const method = fieldAttrs?.vimeoVideoData?.innerContent?.desktop?.value?.vimeo_method;
    const current = (method && typeof method === 'string') ? method : 'vimeo_url';
    return current !== 'embed_code';
  };

  if (groupConfiguration?.contentVimeoVideo?.component?.props) {
    set(groupConfiguration, ['contentVimeoVideo', 'component', 'props', 'fields', 'vimeo_url', 'visible'], showUrlCallback);
    set(groupConfiguration, ['contentVimeoVideo', 'component', 'props', 'fields', 'vimeo_id', 'visible'], showIdCallback);
    set(groupConfiguration, ['contentVimeoVideo', 'component', 'props', 'fields', 'vimeo_embed', 'visible'], showEmbedCallback);
  }
 
  if (groupConfiguration?.videoOptionsVimeoVideo) {
    if (!showOptions) {
      // Manually remove the group if it shouldn't be shown
      delete groupConfiguration.videoOptionsVimeoVideo;
    } else if (groupConfiguration.videoOptionsVimeoVideo.component?.props) {
      // Apply visibility to individual fields if group is shown
      set(groupConfiguration, ['videoOptionsVimeoVideo', 'component', 'props', 'fields', 'vimeo_start', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsVimeoVideo', 'component', 'props', 'fields', 'autoplay', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsVimeoVideo', 'component', 'props', 'fields', 'mute', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsVimeoVideo', 'component', 'props', 'fields', 'loop', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsVimeoVideo', 'component', 'props', 'fields', 'player_control', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsVimeoVideo', 'component', 'props', 'fields', 'intro_portait', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsVimeoVideo', 'component', 'props', 'fields', 'intro_title', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsVimeoVideo', 'component', 'props', 'fields', 'intro_byline', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsVimeoVideo', 'component', 'props', 'fields', 'playsinline', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsVimeoVideo', 'component', 'props', 'fields', 'vimeo_color', 'visible'], showOptionsCallback);
    }
  }

  return <ModuleGroups groups={groupConfiguration} />;
};

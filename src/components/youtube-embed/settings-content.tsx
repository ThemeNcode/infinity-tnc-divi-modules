import React, { type ReactElement } from 'react';
import set from 'lodash/set';

import { ModuleGroups } from '@divi/module';
import { Module } from '@divi/types';

import { YoutubeEmbedAttrs } from './types';

/**
 * Youtube Embed content settings component.
 *
 * @param {Module.Settings.Panel.Props<YoutubeEmbedAttrs>} props The component props.
 *
 * @returns {ReactElement}
 */
export const SettingsContent = ({
  attrs,
  groupConfiguration,
}: Module.Settings.Panel.Props<YoutubeEmbedAttrs>): ReactElement => {
  
  const videoMethod = attrs?.youtubeEmbedData?.innerContent?.desktop?.value?.video_method;
  const currentMethod = (videoMethod && typeof videoMethod === 'string') ? videoMethod : 'video_url';
  const showOptions = currentMethod !== 'embed_code';

  const showUrlCallback = (params: Module.Settings.Field.CallbackParams<YoutubeEmbedAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const method = fieldAttrs?.youtubeEmbedData?.innerContent?.desktop?.value?.video_method;
    const current = (method && typeof method === 'string') ? method : 'video_url';
    return current === 'video_url';
  };

  const showIdCallback = (params: Module.Settings.Field.CallbackParams<YoutubeEmbedAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const method = fieldAttrs?.youtubeEmbedData?.innerContent?.desktop?.value?.video_method;
    const current = (method && typeof method === 'string') ? method : 'video_url';
    return current === 'video_id';
  };

  const showEmbedCallback = (params: Module.Settings.Field.CallbackParams<YoutubeEmbedAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const method = fieldAttrs?.youtubeEmbedData?.innerContent?.desktop?.value?.video_method;
    const current = (method && typeof method === 'string') ? method : 'video_url';
    return current === 'embed_code';
  };

  const showOptionsCallback = (params: Module.Settings.Field.CallbackParams<YoutubeEmbedAttrs>) => {
    const { attrs: fieldAttrs } = params;
    const method = fieldAttrs?.youtubeEmbedData?.innerContent?.desktop?.value?.video_method;
    const current = (method && typeof method === 'string') ? method : 'video_url';
    return current !== 'embed_code';
  };

  if (groupConfiguration?.contentYoutubeEmbed?.component?.props) {
    set(groupConfiguration, ['contentYoutubeEmbed', 'component', 'props', 'fields', 'youtube_url', 'visible'], showUrlCallback);
    set(groupConfiguration, ['contentYoutubeEmbed', 'component', 'props', 'fields', 'youtube_id', 'visible'], showIdCallback);
    set(groupConfiguration, ['contentYoutubeEmbed', 'component', 'props', 'fields', 'youtube_embed', 'visible'], showEmbedCallback);
  }
 
  if (groupConfiguration?.videoOptionsYoutubeEmbed) {
    if (!showOptions) {
      // Manually remove the group if it shouldn't be shown
      delete groupConfiguration.videoOptionsYoutubeEmbed;
    } else if (groupConfiguration.videoOptionsYoutubeEmbed.component?.props) {
      // Apply visibility to individual fields
      set(groupConfiguration, ['videoOptionsYoutubeEmbed', 'component', 'props', 'fields', 'video_start', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsYoutubeEmbed', 'component', 'props', 'fields', 'video_end', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsYoutubeEmbed', 'component', 'props', 'fields', 'autoplay', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsYoutubeEmbed', 'component', 'props', 'fields', 'mute', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsYoutubeEmbed', 'component', 'props', 'fields', 'loop', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsYoutubeEmbed', 'component', 'props', 'fields', 'player_control', 'visible'], showOptionsCallback);
      set(groupConfiguration, ['videoOptionsYoutubeEmbed', 'component', 'props', 'fields', 'video_rel', 'visible'], showOptionsCallback);
    }
  }

  return <ModuleGroups groups={groupConfiguration} />;
};

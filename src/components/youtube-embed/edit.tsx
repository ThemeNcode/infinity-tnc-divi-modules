import React, { type ReactElement } from 'react';

import { ModuleContainer } from '@divi/module';

import { moduleClassnames } from './module-classnames';
import { ModuleScriptData } from './module-script-data';
import { ModuleStyles } from './styles';
import { YoutubeEmbedEditProps } from './types';

/**
 * Youtube Embed edit component for the Visual Builder.
 *
 * @param {YoutubeEmbedEditProps} props The module edit component props.
 *
 * @returns {ReactElement}
 */
const YoutubeEmbedEdit = (props: YoutubeEmbedEditProps): ReactElement => {
  const {
    attrs,
    id,
    name,
    elements,
  } = props;

  const youtubeData   = attrs?.youtubeEmbedData?.innerContent?.desktop?.value ?? {};
  const videoType     = youtubeData?.video_type ?? 'video';
  const videoMethod   = youtubeData?.video_method ?? 'video_url';
  const youtubeUrl    = youtubeData?.youtube_url ?? 'https://www.youtube.com/watch?v=z8uxAkjll5g';
  const youtubeId     = youtubeData?.youtube_id ?? '';
  const youtubeEmbed  = youtubeData?.youtube_embed ?? '';
  const videoStart    = youtubeData?.video_start ?? '0';
  const videoEnd      = youtubeData?.video_end ?? '0';
  const autoplay      = youtubeData?.autoplay ?? 'on';
  const mute          = youtubeData?.mute ?? 'off';
  const loop          = youtubeData?.loop ?? 'off';
  const playerControl = youtubeData?.player_control ?? 'off';
  const videoRel      = youtubeData?.video_rel ?? 'off';

  const autoplayValue = autoplay === 'on' ? 1 : 0;
  const muteValue     = mute === 'on' ? 1 : 0;
  const loopValue     = loop === 'on' ? 1 : 0;
  const controlValue  = playerControl === 'on' ? 1 : 0;
  const relValue      = videoRel === 'on' ? 1 : 0;

  let content: ReactElement | null = null;

  if (videoType === 'video') {
    let exactId = '';
    if (videoMethod === 'video_url' && youtubeUrl) {
      const match = youtubeUrl.match(/(?:youtube(?:-nocookie)?\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i);
      exactId = match ? match[1] : '';
    } else if (videoMethod === 'video_id') {
      exactId = youtubeId;
    }

    if (exactId && videoMethod !== 'embed_code') {
      const iframeSrc = `https://www.youtube.com/embed/${exactId}?controls=${controlValue}&autoplay=${autoplayValue}&loop=${loopValue}&mute=${muteValue}&start=${videoStart}&end=${videoEnd}&rel=${relValue}`;
      content = (
        <iframe
          key="youtube_video"
          src={iframeSrc}
          title="YouTube video player"
          frameBorder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowFullScreen
        />
      );
    } else if (videoMethod === 'embed_code' && youtubeEmbed) {
      content = <div key="youtube_embed" dangerouslySetInnerHTML={{ __html: youtubeEmbed }} />;
    }
  } else if (videoType === 'playlist') {
    let playlistId = '';
    if (videoMethod === 'video_url' && youtubeUrl) {
      const match = youtubeUrl.match(/(?:youtube(?:-nocookie)?\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]list=)|youtu\.be\/)([^"&?\/ ]{34})/i);
      playlistId = match ? match[1] : '';
    } else if (videoMethod === 'video_id') {
      playlistId = youtubeId;
    }

    if (playlistId && videoMethod !== 'embed_code') {
      const iframeSrc = `https://www.youtube.com/embed/videoseries?controls=${controlValue}&autoplay=${autoplayValue}&loop=${loopValue}&mute=${muteValue}&start=${videoStart}&end=${videoEnd}&rel=${relValue}&list=${playlistId}`;
      content = (
        <iframe
          key="youtube_playlist"
          src={iframeSrc}
          title="YouTube playlist player"
          frameBorder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowFullScreen
        />
      );
    } else if (videoMethod === 'embed_code' && youtubeEmbed) {
      content = <div key="youtube_playlist_embed" dangerouslySetInnerHTML={{ __html: youtubeEmbed }} />;
    }
  }

  return (
    <ModuleContainer
      id={id}
      name={name}
      attrs={attrs}
      elements={elements}
      classnamesFunction={moduleClassnames}
      scriptDataComponent={ModuleScriptData}
      stylesComponent={ModuleStyles}
    >
      {elements.styleComponents({
        attrName: 'module',
      })}
      <div className="inftnc_youtube_video_container" key={videoMethod + videoType}>
        {content}
      </div>
    </ModuleContainer>
  );
};

export { YoutubeEmbedEdit };

import React, { type ReactElement } from 'react';

import { ModuleContainer } from '@divi/module';

import { moduleClassnames } from './module-classnames';
import { ModuleScriptData } from './module-script-data';
import { ModuleStyles } from './styles';
import { VimeoVideoEditProps } from './types';
import { sanitizeEmbedHtml } from '../../utils/sanitize-embed';

/**
 * Vimeo Video edit component for the Visual Builder.
 *
 * @since ??
 *
 * @param {VimeoVideoEditProps} props The module edit component props.
 *
 * @returns {ReactElement}
 */
const VimeoVideoEdit = (props: VimeoVideoEditProps): ReactElement => {
  const {
    attrs,
    id,
    name,
    elements,
  } = props;

  const vimeoData     = attrs?.vimeoVideoData?.innerContent?.desktop?.value ?? {};
  const vimeoMethod   = vimeoData?.vimeo_method ?? 'vimeo_url';
  const vimeoUrl      = vimeoData?.vimeo_url ?? 'https://vimeo.com/915873558';
  const vimeoId       = vimeoData?.vimeo_id ?? '';
  const vimeoEmbed    = vimeoData?.vimeo_embed ?? '';
  const vimeoStart    = vimeoData?.vimeo_start ?? '';
  const autoplay      = vimeoData?.autoplay ?? 'on';
  const mute          = vimeoData?.mute ?? 'on';
  const loop          = vimeoData?.loop ?? 'off';
  const playerControl = vimeoData?.player_control ?? 'off';
  const introPortait  = vimeoData?.intro_portait ?? 'off';
  const introTitle    = vimeoData?.intro_title ?? 'off';
  const introByline   = vimeoData?.intro_byline ?? 'off';
  const playsinline   = vimeoData?.playsinline ?? 'off';
  const vimeoColor    = vimeoData?.vimeo_color ?? '#00adef';

  const autoplayValue    = autoplay === 'on' ? 1 : 0;
  const muteValue        = mute === 'on' ? 1 : 0;
  const loopValue        = loop === 'on' ? 1 : 0;
  const controlValue     = playerControl === 'on' ? 1 : 0;
  const portaitValue     = introPortait === 'on' ? 1 : 0;
  const titleValue       = introTitle === 'on' ? 1 : 0;
  const bylineValue      = introByline === 'on' ? 1 : 0;
  const playsinlineValue = playsinline === 'on' ? 1 : 0;
  const colorValue       = vimeoColor.replace('#', '');

  let mapContent: ReactElement | null = null;

  if (vimeoMethod === 'vimeo_url' && vimeoUrl) {
    const match = vimeoUrl.match(
      /^https?:\/\/(?:www\.|player\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$/im
    );
    const videoId = match ? match[3] : null;
    if (videoId) {
      const iframeSrc = `https://player.vimeo.com/video/${videoId}?&autoplay=${autoplayValue}&loop=${loopValue}&muted=${muteValue}&controls=${controlValue}&title=${titleValue}&byline=${bylineValue}&portrait=${portaitValue}&#t=${vimeoStart}&color=${colorValue}&playsinline=${playsinlineValue}`;
      mapContent = (
        <iframe
          key="vimeo_url"
          src={iframeSrc}
          frameBorder="0"
          allow="autoplay; fullscreen; picture-in-picture"
          allowFullScreen
        />
      );
    }
  } else if (vimeoMethod === 'vimeo_id' && vimeoId) {
    const iframeSrc = `https://player.vimeo.com/video/${vimeoId}?&autoplay=${autoplayValue}&loop=${loopValue}&muted=${muteValue}&controls=${controlValue}&title=${titleValue}&byline=${bylineValue}&portrait=${portaitValue}&#t=${vimeoStart}&color=${colorValue}&playsinline=${playsinlineValue}`;
    mapContent = (
      <iframe
        key="vimeo_id"
        src={iframeSrc}
        frameBorder="0"
        allow="autoplay; fullscreen; picture-in-picture"
        allowFullScreen
      />
    );
  } else if (vimeoMethod === 'embed_code' && vimeoEmbed) {
    mapContent = <div key="embed_code" dangerouslySetInnerHTML={{ __html: sanitizeEmbedHtml(vimeoEmbed) }} />;
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
      <div className="inftnc_vimeo_video_container" key={vimeoMethod}>
        {mapContent}
      </div>
    </ModuleContainer>
  );
};

export { VimeoVideoEdit };

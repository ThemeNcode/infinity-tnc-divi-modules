/* eslint-disable @typescript-eslint/naming-convention */
import { ModuleConversionOutline } from '@divi/types';

export const conversionOutline: ModuleConversionOutline = {
  advanced: {
    admin_label: 'module.meta.adminLabel',
    animation:   'module.decoration.animation',
    background:  'module.decoration.background',
    borders:     {
      default: 'module.decoration.border',
    },
    box_shadow: {
      default: 'module.decoration.boxShadow',
    },
    disabled_on: 'module.decoration.disabledOn',
    height:          'module.decoration.sizing',
    link_options:    'module.advanced.link',
    margin_padding:  'module.decoration.spacing',
    max_width:       'module.decoration.sizing',
    module:          'module.advanced.htmlAttributes',
    overflow:        'module.decoration.overflow',
    position_fields: 'module.decoration.position',
    scroll:          'module.decoration.scroll',
    sticky:          'module.decoration.sticky',
    transform:  'module.decoration.transform',
    transition: 'module.decoration.transition',
    z_index:    'module.decoration.zIndex',
  },
  css: {
    after:        'css.*.after',
    before:       'css.*.before',
    main_element: 'css.*.mainElement',
    iframe:       'css.*.iframe',
  },
  module: {
    video_type:     'youtubeEmbedData.innerContent.*.video_type',
    video_method:   'youtubeEmbedData.innerContent.*.video_method',
    youtube_url:    'youtubeEmbedData.innerContent.*.youtube_url',
    youtube_id:     'youtubeEmbedData.innerContent.*.youtube_id',
    youtube_embed:  'youtubeEmbedData.innerContent.*.youtube_embed',
    video_start:    'youtubeEmbedData.innerContent.*.video_start',
    video_end:      'youtubeEmbedData.innerContent.*.video_end',
    autoplay:       'youtubeEmbedData.innerContent.*.autoplay',
    mute:           'youtubeEmbedData.innerContent.*.mute',
    loop:           'youtubeEmbedData.innerContent.*.loop',
    player_control: 'youtubeEmbedData.innerContent.*.player_control',
    video_rel:      'youtubeEmbedData.innerContent.*.video_rel',
  },
};

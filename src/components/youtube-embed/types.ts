import { Module, FormatBreakpointStateAttr } from '@divi/types';

export interface YoutubeEmbedAttrs extends Module.Attributes {
  youtubeEmbedData?: {
    innerContent?: FormatBreakpointStateAttr<{
      video_type?: string;
      video_method?: string;
      youtube_url?: string;
      youtube_id?: string;
      youtube_embed?: string;
      video_start?: string;
      video_end?: string;
      autoplay?: string;
      mute?: string;
      loop?: string;
      player_control?: string;
      video_rel?: string;
    }>;
  };
}

export interface YoutubeEmbedEditProps extends Module.Props.Edit<YoutubeEmbedAttrs> {}

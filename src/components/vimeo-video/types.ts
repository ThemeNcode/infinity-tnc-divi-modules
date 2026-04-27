// Divi dependencies.
import { ModuleEditProps } from '@divi/module-library';
import {
  FormatBreakpointStateAttr,
  InternalAttrs,
  type Element,
  type Module,
} from '@divi/types';

export interface VimeoVideoCssAttr extends Module.Css.AttributeValue {
  iframe?: string;
}

export type VimeoVideoCssGroupAttr = FormatBreakpointStateAttr<VimeoVideoCssAttr>;

export interface VimeoVideoAttrs extends InternalAttrs {
  css?: VimeoVideoCssGroupAttr;

  module?: {
    meta?: Element.Meta.Attributes;
    advanced?: {
      link?: Element.Advanced.Link.Attributes;
      htmlAttributes?: Element.Advanced.IdClasses.Attributes;
    };
    decoration?: Element.Decoration.PickedAttributes<
      'animation' |
      'background' |
      'border' |
      'boxShadow' |
      'disabledOn' |
      'overflow' |
      'position' |
      'scroll' |
      'sizing' |
      'spacing' |
      'sticky' |
      'transform' |
      'transition' |
      'zIndex'
    >;
  };

  vimeoVideoData?: {
    innerContent?: FormatBreakpointStateAttr<{
      vimeo_method?: string;
      vimeo_url?: string;
      vimeo_id?: string;
      vimeo_embed?: string;
      vimeo_start?: string;
      autoplay?: string;
      mute?: string;
      loop?: string;
      player_control?: string;
      intro_portait?: string;
      intro_title?: string;
      intro_byline?: string;
      playsinline?: string;
      vimeo_color?: string;
    }>;
  };
}

export type VimeoVideoEditProps = ModuleEditProps<VimeoVideoAttrs>;

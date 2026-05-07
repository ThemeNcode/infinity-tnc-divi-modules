import { ModuleEditProps } from '@divi/module-library';
import {
  FormatBreakpointStateAttr,
  InternalAttrs,
  type Element,
  type Module,
} from '@divi/types';

export interface LogoCarouselCssAttr extends Module.Css.AttributeValue {
  logo?: string;
  navigation?: string;
  pagination?: string;
}

export type LogoCarouselCssGroupAttr = FormatBreakpointStateAttr<LogoCarouselCssAttr>;

export interface LogoCarouselInnerContent {
  slides_to_show?: string;
  slides_to_scroll?: string;
  animation_speed?: string;
  autoplay?: string;
  autoplay_speed?: string;
  use_navigation?: string;
  use_pagination?: string;
  slide_spacing?: string;
  infinite?: string;
  pause_on_hover?: string;
  swipe?: string;
  rtl?: string;
  logo_grayscale_default?: string;
  logo_grayscale_hover?: string;
  logo_hover?: string;
  navigation_icon_size?: string;
  navigation_bg_size?: string;
  navigation_icon_color?: string;
  navigation_bg_color?: string;
  pagination_dots_size?: string;
  pagination_active_dots_size?: string;
  pagination_dots_color?: string;
  dots_alignment?: string;
}

export interface LogoCarouselAttrs extends InternalAttrs {
  css?: LogoCarouselCssGroupAttr;

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

  logoCarouselData?: {
    innerContent?: FormatBreakpointStateAttr<LogoCarouselInnerContent>;
  };
}

export type LogoCarouselEditProps = ModuleEditProps<LogoCarouselAttrs>;

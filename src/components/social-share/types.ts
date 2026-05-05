import { ModuleEditProps } from '@divi/module-library';
import {
  FormatBreakpointStateAttr,
  InternalAttrs,
  type Element,
  type Module,
} from '@divi/types';

export interface SocialShareCssAttr extends Module.Css.AttributeValue {
  wrapper?: string;
  share_link?: string;
  social_icon?: string;
  social_text?: string;
}

export type SocialShareCssGroupAttr = FormatBreakpointStateAttr<SocialShareCssAttr>;

export interface SocialShareInnerContent {
  button_layout?: string;
  button_shape?: string;
  columns?: string;
  columns_gap?: string;
  row_gap?: string;
  button_bg?: string;
  icon_color?: string;
  icon_size?: string;
  button_padding_top?: string;
  button_padding_right?: string;
  button_padding_bottom?: string;
  button_padding_left?: string;
}

export interface SocialShareAttrs extends InternalAttrs {
  css?: SocialShareCssGroupAttr;

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

  buttonText?: {
    decoration?: Element.Decoration.PickedAttributes<'font'>;
  };

  socialShareData?: {
    innerContent?: FormatBreakpointStateAttr<SocialShareInnerContent>;
  };
}

export type SocialShareEditProps = ModuleEditProps<SocialShareAttrs>;

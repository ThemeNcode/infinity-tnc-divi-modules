import { ModuleEditProps } from '@divi/module-library';
import {
  FormatBreakpointStateAttr,
  InternalAttrs,
  type Element,
  type Module,
} from '@divi/types';
import { SocialShareAttrs } from '../social-share/types';

export interface SocialShareChildCssAttr extends Module.Css.AttributeValue {
  share_link?: string;
  social_icon?: string;
  social_text?: string;
}

export type SocialShareChildCssGroupAttr = FormatBreakpointStateAttr<SocialShareChildCssAttr>;

export interface SocialShareChildInnerContent {
  social_share?: string;
  button_color_child?: string;
  button_padding_child?: string;
  icon_color_child?: string;
  icon_size_child?: string;
}

export interface SocialShareChildAttrs extends InternalAttrs {
  css?: SocialShareChildCssGroupAttr;

  module?: {
    meta?: Element.Meta.Attributes;
    advanced?: {
      htmlAttributes?: Element.Advanced.IdClasses.Attributes;
    };
    decoration?: Element.Decoration.PickedAttributes<
      'background' |
      'border' |
      'boxShadow' |
      'spacing' |
      'animation' |
      'transform' |
      'transition' |
      'disabledOn'
    >;
  };

  buttonText?: {
    decoration?: Element.Decoration.PickedAttributes<'font'>;
  };

  socialShareChildData?: {
    innerContent?: FormatBreakpointStateAttr<SocialShareChildInnerContent>;
  };
}

export type SocialShareChildEditProps = ModuleEditProps<SocialShareChildAttrs, SocialShareAttrs>;

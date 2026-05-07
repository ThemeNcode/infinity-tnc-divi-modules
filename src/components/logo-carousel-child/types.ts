import { ModuleEditProps } from '@divi/module-library';
import {
  FormatBreakpointStateAttr,
  InternalAttrs,
  type Element,
  type Module,
} from '@divi/types';

export interface LogoCarouselChildCssAttr extends Module.Css.AttributeValue {
  logo?: string;
}

export type LogoCarouselChildCssGroupAttr = FormatBreakpointStateAttr<LogoCarouselChildCssAttr>;

export interface LogoCarouselChildInnerContent {
  logo?: string;
  alt?: string;
}

export interface LogoCarouselChildAttrs extends InternalAttrs {
  css?: LogoCarouselChildCssGroupAttr;

  module?: {
    meta?: Element.Meta.Attributes;
    advanced?: {
      htmlAttributes?: Element.Advanced.IdClasses.Attributes;
    };
    decoration?: Element.Decoration.PickedAttributes<
      'animation' |
      'background' |
      'border' |
      'boxShadow' |
      'disabledOn' |
      'spacing' |
      'transform' |
      'transition'
    >;
  };

  logoCarouselChildData?: {
    innerContent?: FormatBreakpointStateAttr<LogoCarouselChildInnerContent>;
  };
}

export type LogoCarouselChildEditProps = ModuleEditProps<LogoCarouselChildAttrs>;

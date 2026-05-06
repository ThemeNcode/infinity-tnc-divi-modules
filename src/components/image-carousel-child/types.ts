import { ModuleEditProps } from '@divi/module-library';
import {
  FormatBreakpointStateAttr,
  InternalAttrs,
  type Element,
  type Module,
} from '@divi/types';
import { ImageCarouselAttrs } from '../image-carousel/types';

export interface ImageCarouselChildCssAttr extends Module.Css.AttributeValue {
  image?: string;
}

export type ImageCarouselChildCssGroupAttr = FormatBreakpointStateAttr<ImageCarouselChildCssAttr>;

export interface ImageCarouselChildInnerContent {
  image?: string;
  alt?: string;
}

export interface ImageCarouselChildAttrs extends InternalAttrs {
  css?: ImageCarouselChildCssGroupAttr;

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

  imageCarouselChildData?: {
    innerContent?: FormatBreakpointStateAttr<ImageCarouselChildInnerContent>;
  };
}

export type ImageCarouselChildEditProps = ModuleEditProps<ImageCarouselChildAttrs, ImageCarouselAttrs>;

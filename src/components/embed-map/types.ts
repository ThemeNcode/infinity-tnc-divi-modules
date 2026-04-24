// Divi dependencies.
import { ModuleEditProps } from '@divi/module-library';
import {
  FormatBreakpointStateAttr,
  InternalAttrs,
  type Element,
  type Module,
} from '@divi/types';

export interface EmbedMapCssAttr extends Module.Css.AttributeValue {
  iframe?: string;
}

export type EmbedMapCssGroupAttr = FormatBreakpointStateAttr<EmbedMapCssAttr>;

export interface EmbedMapAttrs extends InternalAttrs {
  // CSS options is used across multiple elements inside the module thus it deserves its own top property.
  css?: EmbedMapCssGroupAttr;

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

  sourceData?: {
    innerContent?: FormatBreakpointStateAttr<{
      sourceType?: string;
      latitudeLongitude?: string;
      mapZoom?: string;
      embedCode?: string;
    }>;
  };
}

export type EmbedMapEditProps = ModuleEditProps<EmbedMapAttrs>;

import { Module, FormatBreakpointStateAttr, InternalAttrs } from '@divi/types';

export interface StarRatingCssAttr extends Module.Css.AttributeValue {
  star_wrapper?: string;
  rating_title?: string;
  rating_number?: string;
}

export type StarRatingCssGroupAttr = FormatBreakpointStateAttr<StarRatingCssAttr>;

export interface StarRatingInnerContent {
  title?: string;
  count_star?: string;
  rating?: string;
  show_rating_number?: string;
  icon_color?: string;
  empty_color?: string;
  star_size?: string;
  gap?: string;
  star_alignment?: string;
}

export interface StarRatingAttrs extends InternalAttrs {
  css?: StarRatingCssGroupAttr;

  module?: {
    meta?: Module.Element.Meta.Attributes;
    advanced?: {
      link?: Module.Element.Advanced.Link.Attributes;
      htmlAttributes?: Module.Element.Advanced.IdClasses.Attributes;
      header?: {
        title?: {
          header_level?: FormatBreakpointStateAttr<string>;
          [key: string]: any;
        };
      };
    };
    decoration?: Module.Element.Decoration.PickedAttributes<
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

  titleText?: {
    decoration?: {
      font?: any;
    };
  };

  ratingNumber?: {
    decoration?: {
      font?: any;
    };
  };

  starRatingData?: {
    innerContent?: FormatBreakpointStateAttr<StarRatingInnerContent>;
  };
}

export type StarRatingEditProps = Module.Edit.Props<StarRatingAttrs>;

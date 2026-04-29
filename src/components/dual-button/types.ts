import { Module, FormatBreakpointStateAttr, InternalAttrs } from '@divi/types';

export interface DualButtonCssAttr extends Module.Css.AttributeValue {
  button_wrapper?: string;
  left_button?: string;
  right_button?: string;
}

export type DualButtonCssGroupAttr = FormatBreakpointStateAttr<DualButtonCssAttr>;

export interface DualButtonInnerContent {
  button_alignment?: string;
  button_gap?: string;
}

export interface DualButtonButtonInnerContent {
  text?: string;
  linkUrl?: string;
  linkTarget?: string;
}

export interface DualButtonButtonDecoration {
  button?: any;
}

export interface DualButtonAttrs extends InternalAttrs {
  css?: DualButtonCssGroupAttr;

  module?: {
    meta?: Module.Element.Meta.Attributes;
    advanced?: {
      link?: Module.Element.Advanced.Link.Attributes;
      htmlAttributes?: Module.Element.Advanced.IdClasses.Attributes;
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

  dualButtonData?: {
    innerContent?: FormatBreakpointStateAttr<DualButtonInnerContent>;
  };

  buttonLeft?: {
    innerContent?: FormatBreakpointStateAttr<DualButtonButtonInnerContent>;
    decoration?: DualButtonButtonDecoration;
  };

  buttonRight?: {
    innerContent?: FormatBreakpointStateAttr<DualButtonButtonInnerContent>;
    decoration?: DualButtonButtonDecoration;
  };
}

export type DualButtonEditProps = Module.Edit.Props<DualButtonAttrs>;

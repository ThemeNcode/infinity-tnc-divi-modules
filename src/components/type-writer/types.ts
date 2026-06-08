import { Module, FormatBreakpointStateAttr, InternalAttrs } from '@divi/types';

export interface TypeWriterCssAttr extends Module.Css.AttributeValue {
  main_title?: string;
  before_text?: string;
  after_text?: string;
}

export type TypeWriterCssGroupAttr = FormatBreakpointStateAttr<TypeWriterCssAttr>;

export interface TypeWriterInnerContent {
  before_text?: string;
  typing_text?: string;
  after_text?: string;
  typing_speed?: string;
  typing_backspeed?: string;
  pause_for?: string;
  typing_cursor?: string;
  typing_loop?: string;
}

export interface TypeWriterAttrs extends InternalAttrs {
  css?: TypeWriterCssGroupAttr;

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

  typingText?: {
    decoration?: {
      font?: any;
    };
  };

  beforeText?: {
    decoration?: {
      font?: any;
    };
  };

  afterText?: {
    decoration?: {
      font?: any;
    };
  };

  typewriterData?: {
    innerContent?: FormatBreakpointStateAttr<TypeWriterInnerContent>;
  };
}

export type TypeWriterEditProps = Module.Edit.Props<TypeWriterAttrs>;

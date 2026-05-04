import { ModuleEditProps } from '@divi/module-library';
import {
  FormatBreakpointStateAttr,
  InternalAttrs,
  type Element,
  type Module,
} from '@divi/types';

export interface BreadCrumbsCssAttr extends Module.Css.AttributeValue {
  before_text?: string;
  home_text?: string;
  seperator?: string;
  link_text?: string;
}

export type BreadCrumbsCssGroupAttr = FormatBreakpointStateAttr<BreadCrumbsCssAttr>;

export interface BreadCrumbsDataValue {
  home_text?: string;
  before_text?: string;
  seperator_icon?: string;
  use_before_icon?: string;
  before_text_icon?: string;
  link_color?: string;
  seperate_icon_color?: string;
  current_text_color?: string;
  before_text_color?: string;
}

export interface BreadCrumbsAttrs extends InternalAttrs {
  css?: BreadCrumbsCssGroupAttr;

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

  breadcrumbText?: {
    decoration?: Element.Decoration.PickedAttributes<'font'>;
  };

  breadCrumbsData?: {
    innerContent?: FormatBreakpointStateAttr<BreadCrumbsDataValue>;
  };
}

export type BreadCrumbsEditProps = ModuleEditProps<BreadCrumbsAttrs>;

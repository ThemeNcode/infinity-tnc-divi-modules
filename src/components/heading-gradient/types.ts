import { Module, FormatBreakpointStateAttr, InternalAttrs } from '@divi/types';
import { Element } from '@divi/types';

export interface HeadingGradientInnerContent {
  gradient_options?: string;
  gradient_type?: string;
  linear_position?: string;
  radial_position?: string;
  ellipse_position?: string;
  start_color?: string;
  end_color?: string;
  start_position?: number;
  end_position?: number;
  presets_gradient?: string;
}

export interface HeadingGradientAttrs extends InternalAttrs {
  title?: {
    innerContent?: FormatBreakpointStateAttr<string>;
    decoration?: Element.Decoration.PickedAttributes<'font'>;
  };
  headingGradientData?: {
    innerContent?: FormatBreakpointStateAttr<HeadingGradientInnerContent>;
  };
}

export type HeadingGradientEditProps = Module.Edit.Props<HeadingGradientAttrs>;

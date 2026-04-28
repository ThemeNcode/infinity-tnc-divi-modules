import { Module, FormatBreakpointStateAttr } from '@divi/types';

export interface HeadingGradientInnerContent {
  gradient_title?: string;
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

export interface HeadingGradientAttrs extends Module.Attributes {
  headingGradientData?: {
    innerContent?: FormatBreakpointStateAttr<HeadingGradientInnerContent>;
  };
}

export type HeadingGradientEditProps = Module.Edit.Props<HeadingGradientAttrs>;

import { type HeadingGradientAttrs } from './types';

export const placeholderContent: Partial<HeadingGradientAttrs> = {
  headingGradientData: {
    innerContent: {
      desktop: {
        value: {
          gradient_title:   'My Awesome Heading with Gradient',
          gradient_options: 'gradient_custom_color',
          gradient_type:    'linear_gradient',
          linear_position:  'right',
          radial_position:  'center center',
          ellipse_position: 'center center',
          start_color:      '#481CA6',
          end_color:        '#AC43D9',
          start_position:   0,
          end_position:     100,
          presets_gradient: 'gradient_preset1',
        },
      },
    },
  },
};

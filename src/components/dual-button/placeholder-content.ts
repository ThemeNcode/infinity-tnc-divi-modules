import { ModuleLibrary } from '@divi/types';
import { DualButtonAttrs } from './types';

export const placeholderContent: ModuleLibrary.Module.PlaceholderContent<DualButtonAttrs> = {
  dualButtonData: {
    innerContent: {
      desktop: {
        value: {
          button_alignment: 'flex-start',
          button_gap: '10px',
        },
      },
    },
  },
  buttonLeft: {
    innerContent: {
      desktop: {
        value: {
          text:       'Left Button',
          linkUrl:    '#',
          linkTarget: 'off',
        },
      },
    },
  },
  buttonRight: {
    innerContent: {
      desktop: {
        value: {
          text:       'Right Button',
          linkUrl:    '#',
          linkTarget: 'off',
        },
      },
    },
  },
};

import { ModuleLibrary } from '@divi/types';
import { TypeWriterAttrs } from './types';

export const placeholderContent: ModuleLibrary.Module.PlaceholderContent<TypeWriterAttrs> = {
  typewriterData: {
    innerContent: {
      desktop: {
        value: {
          before_text:      'I am a Heading with',
          typing_text:      'Typewriter|Typing Animation',
          after_text:       'Effect',
          typing_speed:     '75',
          typing_backspeed: '75',
          pause_for:        '1500',
          typing_cursor:    '|',
          typing_loop:      'on',
        },
      },
    },
  },
};

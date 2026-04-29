/* eslint-disable @typescript-eslint/naming-convention */
import { ModuleConversionOutline } from '@divi/types';

export const conversionOutline: ModuleConversionOutline = {
  advanced: {
    admin_label:     'module.meta.adminLabel',
    animation:       'module.decoration.animation',
    background:      'module.decoration.background',
    borders:         { default: 'module.decoration.border' },
    box_shadow:      { default: 'module.decoration.boxShadow' },
    disabled_on:     'module.decoration.disabledOn',
    fonts:           {
      title:            'module.advanced.header.title',
      before_title_text: 'beforeText.decoration.font',
      after_title_text:  'afterText.decoration.font',
    },
    height:          'module.decoration.sizing',
    link_options:    'module.advanced.link',
    margin_padding:  'module.decoration.spacing',
    max_width:       'module.decoration.sizing',
    module:          'module.advanced.htmlAttributes',
    overflow:        'module.decoration.overflow',
    position_fields: 'module.decoration.position',
    scroll:          'module.decoration.scroll',
    sticky:          'module.decoration.sticky',
    transform:       'module.decoration.transform',
    transition:      'module.decoration.transition',
    z_index:         'module.decoration.zIndex',
  },
  css: {
    after:        'css.*.after',
    before:       'css.*.before',
    main_element: 'css.*.mainElement',
    main_title:   'css.*.main_title',
    before_text:  'css.*.before_text',
    after_text:   'css.*.after_text',
  },
  module: {
    before_text:      'typewriterData.innerContent.*.before_text',
    typing_text:      'typewriterData.innerContent.*.typing_text',
    after_text:       'typewriterData.innerContent.*.after_text',
    typing_speed:     'typewriterData.innerContent.*.typing_speed',
    typing_backspeed: 'typewriterData.innerContent.*.typing_backspeed',
    pause_for:        'typewriterData.innerContent.*.pause_for',
    typing_cursor:    'typewriterData.innerContent.*.typing_cursor',
    typing_loop:      'typewriterData.innerContent.*.typing_loop',
  },
};

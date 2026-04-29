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
    fonts: {
      button_left:  'buttonLeft.decoration.button',
      button_right: 'buttonRight.decoration.button',
    },
  },
  css: {
    after:        'css.*.after',
    before:       'css.*.before',
    main_element: 'css.*.mainElement',
  },
  module: {
    button_left_text:            'buttonLeft.innerContent.*.text',
    button_url_left:             'buttonLeft.innerContent.*.linkUrl',
    button_url_left_new_window:  'buttonLeft.innerContent.*.linkTarget',
    button_right_text:           'buttonRight.innerContent.*.text',
    button_url_right:            'buttonRight.innerContent.*.linkUrl',
    button_url_right_new_window: 'buttonRight.innerContent.*.linkTarget',
    button_alignment:            'dualButtonData.innerContent.*.button_alignment',
    button_gap:                  'dualButtonData.innerContent.*.button_gap',
  },
};

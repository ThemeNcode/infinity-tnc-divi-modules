/* eslint-disable @typescript-eslint/naming-convention */
import { convertFontIcon } from '@divi/conversion';
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
    // D4 auto-adds a base `module` font advanced option, so exports carry
    // `module_font`, `module_font_size`, `module_text_align`, etc. Without this
    // mapping those attributes fall through to `unknownAttributes.*`, which flags
    // the whole module `nonconvertible` (Conversion.php ~1618) and leaves it
    // stuck as a Divi 4 shortcode. Map them onto the D5 breadcrumb text font.
    fonts: {
      module: 'breadcrumbText.decoration.font',
    },
  },
  css: {
    after:        'css.*.after',
    before:       'css.*.before',
    main_element: 'css.*.mainElement',
    before_text:  'css.*.before_text',
    home_text:    'css.*.home_text',
    seperator:    'css.*.seperator',
    link_text:    'css.*.link_text',
  },
  module: {
    home_text:           'breadCrumbsData.innerContent.*.home_text',
    before_text:         'breadCrumbsData.innerContent.*.before_text',
    seperator_icon:      'breadCrumbsData.innerContent.*.seperator_icon',
    use_before_icon:     'breadCrumbsData.innerContent.*.use_before_icon',
    before_text_icon:    'breadCrumbsData.innerContent.*.before_text_icon',
    link_color:          'breadCrumbsData.innerContent.*.link_color',
    seperate_icon_color: 'breadCrumbsData.innerContent.*.seperate_icon_color',
    current_text_color:  'breadCrumbsData.innerContent.*.current_text_color',
    before_text_color:   'breadCrumbsData.innerContent.*.before_text_color',
  },
  // D4 stores icons as strings ('&#x35;||divi'); D5 expects an object
  // ({ unicode, type, weight }). convertFontIcon performs that expansion
  // during conversion — without it the module fails to convert (legacy fallback).
  valueExpansionFunctionMap: {
    seperator_icon:   convertFontIcon,
    before_text_icon: convertFontIcon,
  },
};

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
      share_button_text: 'buttonText.decoration.font',
    },
  },
  css: {
    after:        'css.*.after',
    before:       'css.*.before',
    main_element: 'css.*.mainElement',
  },
  module: {
    button_layout:   'socialShareData.innerContent.*.button_layout',
    button_shape:    'socialShareData.innerContent.*.button_shape',
    columns:         'socialShareData.innerContent.*.columns',
    columns_gap:     'socialShareData.innerContent.*.columns_gap',
    row_gap:         'socialShareData.innerContent.*.row_gap',
    button_bg:       'socialShareData.innerContent.*.button_bg',
    icon_color:      'socialShareData.innerContent.*.icon_color',
    icon_size:       'socialShareData.innerContent.*.icon_size',
    // In D4 `button_padding` is a single combined `custom_margin` string
    // ("top|right|bottom|left|..."), while the D5 module reads four separate
    // attributes (button_padding_top/right/bottom/left). Divi's server-side
    // conversion (Conversion::getAttrMap) requires every `module` outline value
    // to be a STRING path — a nested object throws "Illegal offset type" and
    // 500s the whole conversion, and there is no built-in value-expansion that
    // splits it into `button_padding_*` keys. So map the combined string
    // verbatim to a single `button_padding` attribute; the D5 module
    // (ModuleStylesTrait) parses it into top/right/bottom/left when the four
    // separate attributes are empty, preserving the converted padding.
    button_padding:  'socialShareData.innerContent.*.button_padding',
  },
  // Only the responsive `_last_edited` helper stays deprecated (the D5 module
  // renders desktop values only). It must be deprecated rather than omitted, or
  // Divi routes the leftover D4 attribute to `unknownAttributes.*` and flags the
  // whole module `nonconvertible` (Conversion.php ~1618), leaving it stuck as a
  // Divi 4 shortcode module.
  // @ts-expect-error deprecatedMap is a valid outline key consumed server-side
  // (Conversion.php ~261) but is not declared on the ModuleConversionOutline type.
  deprecatedMap: [ 'button_padding_last_edited' ],
};

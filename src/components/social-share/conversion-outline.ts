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
    // NOTE: `button_padding` is intentionally NOT mapped here; it is deprecated
    // below instead. In D4 it is a single combined `custom_margin` string
    // ("top|right|bottom|left|..."), while the D5 module stores it as four
    // separate attributes (button_padding_top/right/bottom/left). Divi's
    // server-side conversion (Conversion::getAttrMap) requires every `module`
    // outline value to be a STRING path; a nested object gets passed to
    // str_replace() and then used as an array key, throwing "Illegal offset
    // type" and 500-ing the whole Divi 4 -> Divi 5 conversion. Divi also ships
    // no built-in value-expansion that outputs `button_padding_*` keys, so the
    // button padding falls back to the D5 module defaults on conversion.
  },
  // `button_padding` (and its responsive `_last_edited` helper) must be listed
  // as deprecated. If simply omitted, Divi routes the leftover D4 attribute to
  // `unknownAttributes.*`, which flags the whole module as `nonconvertible`
  // (Conversion.php ~1618) and leaves it stuck as a Divi 4 shortcode module.
  // Deprecating it makes Divi skip it cleanly so the module converts to D5.
  // @ts-expect-error deprecatedMap is a valid outline key consumed server-side
  // (Conversion.php ~261) but is not declared on the ModuleConversionOutline type.
  deprecatedMap: [ 'button_padding', 'button_padding_last_edited' ],
};

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
    // D4 stores `button_padding` as a single combined `custom_margin` string
    // ("top|right|bottom|left|..."), while the D5 module reads four separate
    // attributes (button_padding_top/right/bottom/left). A nested object here is
    // not allowed — Divi requires a STRING path (Conversion::getAttrMap) — so this
    // points at the PARENT path and `valueExpansionFunctionMap` below splits the
    // value. Divi appends each key the expansion function returns to this path,
    // writing socialShareData.innerContent.desktop.value.button_padding_top etc.
    button_padding:  'socialShareData.innerContent.*',
  },
  // Maps the D4 attribute to a callback registered on the
  // `divi.moduleLibrary.conversion.valueExpansionFunctionMap` filter
  // (see modules/Modules.php -> INFTNC\Modules\Conversion\ValueExpansion).
  // @ts-expect-error valueExpansionFunctionMap is a valid outline key consumed
  // server-side (Conversion.php ~249) but is not on the ModuleConversionOutline type.
  valueExpansionFunctionMap: {
    button_padding: 'inftncShareButtonPadding',
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

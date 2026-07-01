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
    margin_padding:  'module.decoration.spacing',
    module:          'module.advanced.htmlAttributes',
    transform:       'module.decoration.transform',
    transition:      'module.decoration.transition',
    fonts: {
      share_button_text_child: 'buttonText.decoration.font',
    },
  },
  css: {
    after:        'css.*.after',
    before:       'css.*.before',
    main_element: 'css.*.mainElement',
  },
  module: {
    social_share:          'socialShareChildData.innerContent.*.social_share',
    button_color_child:    'socialShareChildData.innerContent.*.button_color_child',
    // NOTE: `button_padding_child` is intentionally NOT mapped here; it is
    // deprecated below instead. See the matching comment in
    // ../social-share/conversion-outline.ts: D4 stores it as a single combined
    // `custom_margin` string while D5 uses four separate attributes, and a
    // nested object here throws "Illegal offset type" in Divi's server-side
    // conversion (Conversion::getAttrMap), 500-ing the whole conversion.
    icon_color_child:      'socialShareChildData.innerContent.*.icon_color_child',
    icon_size_child:       'socialShareChildData.innerContent.*.icon_size_child',
  },
  // Must be deprecated (not just omitted) so Divi does not route the leftover D4
  // attribute to `unknownAttributes.*`, which would mark the module
  // `nonconvertible` and leave it stuck as a Divi 4 shortcode. Padding falls
  // back to the D5 module defaults on conversion.
  // @ts-expect-error deprecatedMap is a valid outline key consumed server-side
  // (Conversion.php ~261) but is not declared on the ModuleConversionOutline type.
  deprecatedMap: [ 'button_padding_child', 'button_padding_child_last_edited' ],
};

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
    // See the matching comment in ../social-share/conversion-outline.ts. D4 stores
    // `button_padding_child` as a single combined `custom_margin` string while D5
    // reads four separate attributes; a nested object here throws "Illegal offset
    // type" in Divi's server-side conversion (Conversion::getAttrMap). Map the
    // combined string verbatim; the D5 module (ModuleStylesTrait) parses it into
    // top/right/bottom/left when the four separate attributes are empty.
    button_padding_child:  'socialShareChildData.innerContent.*.button_padding_child',
    icon_color_child:      'socialShareChildData.innerContent.*.icon_color_child',
    icon_size_child:       'socialShareChildData.innerContent.*.icon_size_child',
  },
  // Only the responsive `_last_edited` helper stays deprecated (the D5 module
  // renders desktop values only). It must be deprecated rather than omitted, or
  // Divi routes the leftover D4 attribute to `unknownAttributes.*` and marks the
  // module `nonconvertible`, leaving it stuck as a Divi 4 shortcode.
  // @ts-expect-error deprecatedMap is a valid outline key consumed server-side
  // (Conversion.php ~261) but is not declared on the ModuleConversionOutline type.
  deprecatedMap: [ 'button_padding_child_last_edited' ],
};

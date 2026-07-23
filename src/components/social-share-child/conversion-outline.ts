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
    // reads four separate attributes. This points at the PARENT path; the expansion
    // function below splits the value and Divi appends each returned key to it.
    button_padding_child:  'socialShareChildData.innerContent.*',
    icon_color_child:      'socialShareChildData.innerContent.*.icon_color_child',
    icon_size_child:       'socialShareChildData.innerContent.*.icon_size_child',
  },
  // Maps the D4 attribute to a callback registered on the
  // `divi.moduleLibrary.conversion.valueExpansionFunctionMap` filter
  // (see modules/Modules.php -> INFTNC\Modules\Conversion\ValueExpansion).
  // @ts-expect-error valueExpansionFunctionMap is a valid outline key consumed
  // server-side (Conversion.php ~249) but is not on the ModuleConversionOutline type.
  valueExpansionFunctionMap: {
    button_padding_child: 'inftncShareButtonPaddingChild',
  },
  // Only the responsive `_last_edited` helper stays deprecated (the D5 module
  // renders desktop values only). It must be deprecated rather than omitted, or
  // Divi routes the leftover D4 attribute to `unknownAttributes.*` and marks the
  // module `nonconvertible`, leaving it stuck as a Divi 4 shortcode.
  // @ts-expect-error deprecatedMap is a valid outline key consumed server-side
  // (Conversion.php ~261) but is not declared on the ModuleConversionOutline type.
  deprecatedMap: [ 'button_padding_child_last_edited' ],
};

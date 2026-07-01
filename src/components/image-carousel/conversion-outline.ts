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
  },
  css: {
    after:        'css.*.after',
    before:       'css.*.before',
    main_element: 'css.*.mainElement',
    image:        'css.*.image',
    navigation:   'css.*.navigation',
    pagination:   'css.*.pagination',
  },
  module: {
    slides_to_show:          'imageCarouselData.innerContent.*.slides_to_show',
    slides_to_scroll:        'imageCarouselData.innerContent.*.slides_to_scroll',
    animation_speed:         'imageCarouselData.innerContent.*.animation_speed',
    autoplay:                'imageCarouselData.innerContent.*.autoplay',
    autoplay_speed:          'imageCarouselData.innerContent.*.autoplay_speed',
    use_navigation:          'imageCarouselData.innerContent.*.use_navigation',
    use_pagination:          'imageCarouselData.innerContent.*.use_pagination',
    slide_spacing:           'imageCarouselData.innerContent.*.slide_spacing',
    infinite:                'imageCarouselData.innerContent.*.infinite',
    pause_on_hover:          'imageCarouselData.innerContent.*.pause_on_hover',
    swipe:                   'imageCarouselData.innerContent.*.swipe',
    rtl:                     'imageCarouselData.innerContent.*.rtl',
    image_grayscale_default: 'imageCarouselData.innerContent.*.image_grayscale_default',
    image_grayscale_hover:   'imageCarouselData.innerContent.*.image_grayscale_hover',
    image_hover:             'imageCarouselData.innerContent.*.image_hover',
    navigation_icon_size:    'imageCarouselData.innerContent.*.navigation_icon_size',
    navigation_bg_size:      'imageCarouselData.innerContent.*.navigation_bg_size',
    navigation_icon_color:   'imageCarouselData.innerContent.*.navigation_icon_color',
    navigation_bg_color:     'imageCarouselData.innerContent.*.navigation_bg_color',
    pagination_cmn_dots_size:    'imageCarouselData.innerContent.*.pagination_dots_size',
    pagination_active_dots_size: 'imageCarouselData.innerContent.*.pagination_active_dots_size',
    pagination_cmn_dots_color:   'imageCarouselData.innerContent.*.pagination_dots_color',
    dots_alignment:          'imageCarouselData.innerContent.*.dots_alignment',
  },
  // The D4 module has a second border group with the `image` slug (Image Border
  // toggle) producing `border_*_image` attributes. The D5 module has no separate
  // image element to hold a border, so there is no conversion target. Left
  // unmapped, these attributes fall through to `unknownAttributes.*`, flagging
  // the whole module `nonconvertible` (Conversion.php ~1618) and leaving it stuck
  // as a Divi 4 shortcode. Deprecate the full `image` border family so Divi skips
  // them cleanly and the module converts (image border falls back to defaults).
  // @ts-expect-error deprecatedMap is a valid outline key consumed server-side
  // (Conversion.php ~261) but is not declared on the ModuleConversionOutline type.
  deprecatedMap: [
    'border_radii_image', 'border_radii_image_last_edited',
    'border_color_all_image', 'border_color_top_image', 'border_color_right_image',
    'border_color_bottom_image', 'border_color_left_image',
    'border_style_all_image', 'border_style_top_image', 'border_style_right_image',
    'border_style_bottom_image', 'border_style_left_image',
    'border_width_all_image', 'border_width_top_image', 'border_width_right_image',
    'border_width_bottom_image', 'border_width_left_image',
  ],
};

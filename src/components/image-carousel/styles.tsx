import React, { ReactElement } from 'react';
import {
  StyleContainer,
  StylesProps,
  CssStyle,
} from '@divi/module';
import { getAttrByMode } from '@divi/module-utils';

import { ImageCarouselAttrs, ImageCarouselInnerContent } from './types';
import { cssFields } from './custom-css';

const ALIGN_MAP: Record<string, string> = {
  left:   'flex-start',
  center: 'center',
  right:  'flex-end',
};

export const ModuleStyles = ({
  attrs,
  elements,
  settings,
  orderClass,
  mode,
  state,
  noStyleTag,
}: StylesProps<ImageCarouselAttrs>): ReactElement => {
  const data = (getAttrByMode(attrs?.imageCarouselData?.innerContent) ?? {}) as ImageCarouselInnerContent;

  const imageGrayscaleDefault   = data.image_grayscale_default ?? 'off';
  const imageGrayscaleHover     = data.image_grayscale_hover ?? 'off';
  const imageHover              = data.image_hover ?? 'none';
  const navIconSize             = data.navigation_icon_size ?? '';
  const navBgSize               = data.navigation_bg_size ?? '';
  const navIconColor            = data.navigation_icon_color ?? '';
  const navBgColor              = data.navigation_bg_color ?? '';
  const paginationDotsSize      = data.pagination_dots_size ?? '';
  const paginationActiveDotsSize = data.pagination_active_dots_size ?? '';
  const paginationDotsColor     = data.pagination_dots_color ?? '';
  const dotsAlignment           = data.dots_alignment ?? 'center';

  const lines: string[] = [];

  if (navIconSize) {
    lines.push(`${orderClass} .slick-inftnc-arrow.slick-prev:before, ${orderClass} .slick-inftnc-arrow.slick-next:before { font-size: ${navIconSize}; }`);
  }

  if (navBgSize) {
    lines.push(`${orderClass} .slick-inftnc-arrow { width: ${navBgSize} !important; height: ${navBgSize} !important; }`);
  }

  if (navIconColor) {
    lines.push(`${orderClass} .slick-inftnc-arrow.slick-prev:before, ${orderClass} .slick-inftnc-arrow.slick-next:before { color: ${navIconColor} !important; }`);
  }

  if (navBgColor) {
    lines.push(`${orderClass} .slick-inftnc-arrow { background-color: ${navBgColor} !important; }`);
  }

  if (paginationDotsSize) {
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .slick-dots li button:before { font-size: ${paginationDotsSize} !important; }`);
  }

  if (paginationActiveDotsSize) {
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .slick-dots li.slick-active button:before { font-size: ${paginationActiveDotsSize} !important; }`);
  }

  if (paginationDotsColor) {
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .slick-dots li button:before { color: ${paginationDotsColor} !important; }`);
  }

  if (dotsAlignment) {
    const justify = ALIGN_MAP[dotsAlignment] ?? 'center';
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .slick-dots { justify-content: ${justify}; }`);
  }

  if (imageGrayscaleDefault === 'on') {
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .image_carousel_img { -webkit-filter: grayscale(100%); filter: grayscale(100%); transition: filter .5s ease 0s; }`);
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .image_carousel_img:hover { -webkit-filter: grayscale(0); filter: none; }`);
  }

  if (imageGrayscaleHover === 'on') {
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .image_carousel_img { -webkit-filter: grayscale(0); filter: none; transition: filter .5s ease 0s; }`);
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .image_carousel_img:hover { -webkit-filter: grayscale(100%); filter: grayscale(100%); }`);
  }

  if (imageHover === 'zoom_in') {
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .image_carousel_img { transition: transform .5s ease 0s; }`);
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .image_carousel_img:hover { transform: scale(1.04); }`);
  } else if (imageHover === 'zoom_out') {
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .image_carousel_img { transition: transform .5s ease 0s; transform: scale(1.04); }`);
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .image_carousel_img:hover { transform: scale(1); }`);
  } else if (imageHover === 'slide') {
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .image_carousel_img { margin-left: 10px; transform: scale(1.01, 1.01); transition: all .5s ease 0s; }`);
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .image_carousel_img:hover { margin-left: 0; }`);
  } else if (imageHover === 'rotate') {
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .image_carousel_img { transform: rotate(15deg) scale(1.4); transition: all .5s ease 0s; }`);
    lines.push(`${orderClass} .inftnc_carousels_image_wrapper .image_carousel_img:hover { transform: rotate(0) scale(1); }`);
  }

  return (
    <StyleContainer mode={mode} state={state} noStyleTag={noStyleTag}>
      {elements.style({
        attrName: 'module',
        styleProps: {
          disabledOn: {
            disabledModuleVisibility: settings?.disabledModuleVisibility,
          },
        },
      })}
      {lines.length > 0 ? <style>{lines.join('\n')}</style> : null}
      <CssStyle
        selector={orderClass}
        attr={attrs?.css}
        cssFields={cssFields}
      />
    </StyleContainer>
  );
};

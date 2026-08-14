import React, { ReactElement } from 'react';
import { ModuleContainer } from '@divi/module';
import * as moduleUtilsNS from '@divi/module-utils';
import { getAttrByMode } from '@divi/module-utils';

import { LogoCarouselChildEditProps, LogoCarouselChildInnerContent } from './types';
import { ModuleStyles } from './styles';
import { moduleClassnames } from './module-classnames';
import { resolveImageSrc } from '../../utils/image-src';

// Fallback for modules created before placeholderContent was registered.
// eslint-disable-next-line @typescript-eslint/no-explicit-any
const defaultImage: string = (moduleUtilsNS as any)?.placeholderContent?.image?.landscape ?? '';

export const LogoCarouselChildEdit = (props: LogoCarouselChildEditProps): ReactElement => {
  const {
    attrs,
    parentAttrs,
    elements,
    id,
    name,
  } = props;

  const data = (getAttrByMode(attrs?.logoCarouselChildData?.innerContent) ?? {}) as LogoCarouselChildInnerContent;
  const logo = resolveImageSrc(data.logo);
  const alt  = data.alt ?? '';

  return (
    <ModuleContainer
      attrs={attrs}
      parentAttrs={parentAttrs}
      elements={elements}
      id={id}
      name={name}
      stylesComponent={ModuleStyles as any}
      classnamesFunction={moduleClassnames as any}
    >
      {elements?.styleComponents({
        attrName: 'module',
      })}
      <div className="inftnc_carousel_child">
        <img
          className="logo_carousel_img"
          src={logo || defaultImage}
          alt={alt}
        />
      </div>
    </ModuleContainer>
  );
};

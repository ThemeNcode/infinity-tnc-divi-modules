import * as moduleUtilsNS from '@divi/module-utils';

import { LogoCarouselChildAttrs } from './types';

// eslint-disable-next-line @typescript-eslint/no-explicit-any
const placeholderImageSrc: string = (moduleUtilsNS as any)?.placeholderContent?.image?.landscape ?? '';

export const placeholderContent: LogoCarouselChildAttrs = {
  logoCarouselChildData: {
    innerContent: {
      desktop: {
        value: {
          logo: placeholderImageSrc,
          alt: '',
        },
      },
    },
  },
};

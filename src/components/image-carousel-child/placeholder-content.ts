import * as moduleUtilsNS from '@divi/module-utils';

import { ImageCarouselChildAttrs } from './types';

// eslint-disable-next-line @typescript-eslint/no-explicit-any
const placeholderImageSrc: string = (moduleUtilsNS as any)?.placeholderContent?.image?.landscape ?? '';

export const placeholderContent: ImageCarouselChildAttrs = {
  imageCarouselChildData: {
    innerContent: {
      desktop: {
        value: {
          image: placeholderImageSrc,
          alt: '',
        },
      },
    },
  },
};

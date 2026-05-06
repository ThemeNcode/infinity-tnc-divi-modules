import { ModuleClassnamesParams } from '@divi/module';
import { ImageCarouselChildAttrs } from './types';

export const moduleClassnames = ({
  classnamesInstance,
}: ModuleClassnamesParams<ImageCarouselChildAttrs>): void => {
  classnamesInstance.add('inftnc_image_carousel_child');
};

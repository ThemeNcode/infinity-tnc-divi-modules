import { ModuleClassnamesParams } from '@divi/module';
import { ImageCarouselAttrs } from './types';

export const moduleClassnames = ({
  classnamesInstance,
}: ModuleClassnamesParams<ImageCarouselAttrs>): void => {
  classnamesInstance.add('inftnc_image_carousel');
};

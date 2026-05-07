import { ModuleClassnamesParams } from '@divi/module';
import { LogoCarouselChildAttrs } from './types';

export const moduleClassnames = ({
  classnamesInstance,
}: ModuleClassnamesParams<LogoCarouselChildAttrs>): void => {
  classnamesInstance.add('inftnc_logo_carousel_child');
};

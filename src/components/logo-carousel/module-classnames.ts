import { ModuleClassnamesParams } from '@divi/module';
import { LogoCarouselAttrs } from './types';

export const moduleClassnames = ({
  classnamesInstance,
}: ModuleClassnamesParams<LogoCarouselAttrs>): void => {
  classnamesInstance.add('inftnc_logo_carousel');
};

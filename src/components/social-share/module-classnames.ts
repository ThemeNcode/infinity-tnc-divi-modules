import { ModuleClassnamesParams } from '@divi/module';
import { SocialShareAttrs } from './types';

export const moduleClassnames = ({
  classnamesInstance,
}: ModuleClassnamesParams<SocialShareAttrs>): void => {
  classnamesInstance.add('inftnc_social_share');
};

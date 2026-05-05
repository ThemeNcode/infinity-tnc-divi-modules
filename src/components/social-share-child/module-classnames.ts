import { ModuleClassnamesParams } from '@divi/module';
import { SocialShareChildAttrs } from './types';

export const moduleClassnames = ({
  classnamesInstance,
}: ModuleClassnamesParams<SocialShareChildAttrs>): void => {
  classnamesInstance.add('inftnc_social_share_child');
};

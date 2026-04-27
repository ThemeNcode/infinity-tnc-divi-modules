import { ModuleClassnamesParams } from '@divi/module';
import { YoutubeEmbedAttrs } from './types';

/**
 * Module classnames function for Youtube Embed Module.
 *
 * @param {ModuleClassnamesParams<YoutubeEmbedAttrs>} param0 Function parameters.
 */
export const moduleClassnames = ({
  classnamesInstance,
}: ModuleClassnamesParams<YoutubeEmbedAttrs>): void => {
  classnamesInstance.add('inftnc_youtube_video');
};

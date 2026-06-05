import { addFilter } from '@wordpress/hooks';
import {
  moduleD4,
  moduleDynamic,
  moduleEmbedMap,
  moduleParent,
  moduleStatic,
  moduleVimeoVideo,
  moduleBreadCrumbs,
  moduleDualButton,
  moduleHeadingGradient,
  moduleImageCarousel,
  moduleLogoCarousel,
  moduleSocialShare,
  moduleStarRating,
  moduleTypeWriter,
  moduleYoutubeEmbed,
} from './icons';

// Add module icons to the icon library.
addFilter('divi.iconLibrary.icon.map', 'extensionExample', (icons) => {
  return {
    ...icons,
    [moduleParent.name]:           moduleParent,
    [moduleStatic.name]:           moduleStatic,
    [moduleDynamic.name]:          moduleDynamic,
    [moduleD4.name]:               moduleD4,
    [moduleEmbedMap.name]:         moduleEmbedMap,
    [moduleVimeoVideo.name]:       moduleVimeoVideo,
    [moduleBreadCrumbs.name]:      moduleBreadCrumbs,
    [moduleDualButton.name]:       moduleDualButton,
    [moduleHeadingGradient.name]:  moduleHeadingGradient,
    [moduleImageCarousel.name]:    moduleImageCarousel,
    [moduleLogoCarousel.name]:     moduleLogoCarousel,
    [moduleSocialShare.name]:      moduleSocialShare,
    [moduleStarRating.name]:       moduleStarRating,
    [moduleTypeWriter.name]:       moduleTypeWriter,
    [moduleYoutubeEmbed.name]:     moduleYoutubeEmbed,
  };
});

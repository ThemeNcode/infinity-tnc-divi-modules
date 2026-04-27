import { addFilter } from '@wordpress/hooks';
import {
  moduleD4,
  moduleDynamic,
  moduleEmbedMap,
  moduleParent,
  moduleStatic,
  moduleVimeoVideo,
} from './icons';

// Add module icons to the icon library.
addFilter('divi.iconLibrary.icon.map', 'extensionExample', (icons) => {
  return {
    ...icons, // This is important. Without this, all other icons will be overwritten.
    [moduleParent.name]:   moduleParent,
    [moduleStatic.name]:   moduleStatic,
    [moduleDynamic.name]:  moduleDynamic,
    [moduleD4.name]:       moduleD4,
    [moduleEmbedMap.name]: moduleEmbedMap,
    [moduleVimeoVideo.name]: moduleVimeoVideo,
  };
});

import { omit } from 'lodash';

import { addAction } from '@wordpress/hooks';

import { registerModule } from '@divi/module-library';

import { childModule } from './components/child-module';
import { d4Module } from './components/d4-module';
import { dynamicModule } from './components/dynamic-module';
import { embedMap } from './components/embed-map';
import { parentModule } from './components/parent-module';
import { vimeoVideo } from './components/vimeo-video';
import { youtubeEmbed } from './components/youtube-embed';
import { staticModule } from './components/static-module';
import { headingGradient } from './components/heading-gradient';
import { breadCrumbs } from './components/bread-crumbs';
import { typeWriter } from './components/type-writer';
import { starRating } from './components/star-rating';

import './module-icons';

// Register modules.
addAction('divi.moduleLibrary.registerModuleLibraryStore.after', 'extensionExample', () => {
  registerModule(staticModule.metadata, omit(staticModule, 'metadata'));
  registerModule(dynamicModule.metadata, omit(dynamicModule, 'metadata'));
  registerModule(childModule.metadata, omit(childModule, 'metadata'));
  registerModule(parentModule.metadata, omit(parentModule, 'metadata'));
  registerModule(d4Module.metadata, omit(d4Module, 'metadata'));
  registerModule(embedMap.metadata, omit(embedMap, 'metadata'));
  registerModule(vimeoVideo.metadata, omit(vimeoVideo, 'metadata'));
  registerModule(youtubeEmbed.metadata, omit(youtubeEmbed, 'metadata'));
  registerModule(headingGradient.metadata, omit(headingGradient, 'metadata'));
  registerModule(breadCrumbs.metadata, omit(breadCrumbs, 'metadata') as any);
  registerModule(typeWriter.metadata, omit(typeWriter, 'metadata') as any);
  registerModule(starRating.metadata, omit(starRating, 'metadata') as any);
});

// Must be the first import: captures WordPress's Underscore before react-svg-star-rating's
// baked-in lodash overwrites the global `_`. See underscore-guard.js for the full rationale.
import { realUnderscore } from './underscore-guard';

import $ from 'jquery';

import EmbedMap from './components/embed-map';
import TypeWriter from './components/type-writer';
import StarRating from './components/start-rating';
import YoutubeEmbed from './components/youtube-embed';
import VimeVideo from './components/vimeo-video';
import HeadingGradient from './components/heading-gradient';
import BreadCrumbs from './components/bread-crumbs';
import DualButtons from './components/dual-button';
import SocialShare from './components/social-share';
import SocialShareChild from './components/social-share-child';
import INFTNC_ImageCarousel from './components/image-carousel';
import ImageCarouselChild from './components/image-carousel-child';
import LogoCarousel from './components/logo-carousel';
import LogoCarouselChild from './components/logo-carousel-child';


// All imports above have now evaluated, including react-svg-star-rating's baked-in lodash,
// which overwrites the global `_`. Put WordPress's Underscore back so the Backbone-based
// media library keeps working ("this.activateMode is not a function" otherwise).
if (realUnderscore && typeof window !== 'undefined' && window._ !== realUnderscore) {
    window._ = realUnderscore;
}

/**
 * Register modules to Visual Builder once the API is ready.
 *
 * @since 1.0.0
 */
$(window).on('et_builder_api_ready', (event, API) => {
    // Register modules.
    API.registerModules([
        EmbedMap,
        TypeWriter,
        StarRating,
        YoutubeEmbed,
        VimeVideo,
        HeadingGradient,
        BreadCrumbs,
        DualButtons,
        SocialShare,
        SocialShareChild,
        INFTNC_ImageCarousel,
        ImageCarouselChild,
        LogoCarousel,
        LogoCarouselChild

    ]);
});

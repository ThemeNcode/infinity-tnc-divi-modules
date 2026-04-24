import $ from 'jquery';

import Divi4Module from './components/divi4-module';
import Divi4OnlyModule from './components/divi4-only-module';
import EmbedMap from './components/embed-map';
import TypeWriter from './components/type-writer';


/**
 * Register modules to Visual Builder once the API is ready.
 *
 * @since 1.0.0
 */
$(window).on('et_builder_api_ready', (event, API) => {
    // Register modules.
    API.registerModules([
        Divi4Module,
        Divi4OnlyModule,
        EmbedMap,
        TypeWriter
    ]);
});

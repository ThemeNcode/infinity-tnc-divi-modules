/**
 * Underscore guard for the Divi 4 Visual Builder bundle.
 *
 * `react-svg-star-rating` (used by the Star Rating module) ships a UMD bundle with
 * a full copy of lodash baked in. lodash's UMD footer assigns itself to the global
 * `_` at load time, clobbering the Underscore that WordPress's media library
 * (Backbone) depends on.
 *
 * WordPress calls `_.each( list, iteratee, context )` (Underscore's 3-argument
 * signature) in `MediaFrame._createModes`. lodash's `each` ignores the third
 * `context` argument, so `this` is lost and `this.activateMode` becomes undefined —
 * breaking the media modal in the builder with
 * "Uncaught TypeError: this.activateMode is not a function".
 *
 * This module is imported FIRST in the entry so it captures the pristine Underscore
 * before the baked-in lodash can overwrite it. The entry then restores it after all
 * modules (including react-svg-star-rating) have finished evaluating.
 */

// Captured before any other import evaluates — this is WordPress's real Underscore.
export const realUnderscore = ( typeof window !== 'undefined' ) ? window._ : undefined;

/**
 * Internal dependencies
 */
import type { ShortcodeAttrs, ShortcodeMatch, ShortcodeOptions, Match, ReplaceCallback, ShortcodeInstance } from './types';
export * from './types';
/**
 * Find the next matching shortcode.
 *
 * @param tag   Shortcode tag.
 * @param text  Text to search.
 * @param index Index to start search from.
 *
 * @return Matched information.
 */
export declare function next(tag: string, text: string, index?: number): ShortcodeMatch | undefined;
/**
 * Replace matching shortcodes in a block of text.
 *
 * @param tag      Shortcode tag.
 * @param text     Text to search.
 * @param callback Function to process the match and return
 *                 replacement string.
 *
 * @return Text with shortcodes replaced.
 */
export declare function replace(tag: string, text: string, callback: ReplaceCallback): string;
/**
 * Generate a string from shortcode parameters.
 *
 * Creates a shortcode instance and returns a string.
 *
 * Accepts the same `options` as the `shortcode()` constructor, containing a
 * `tag` string, a string or object of `attrs`, a boolean indicating whether to
 * format the shortcode using a `single` tag, and a `content` string.
 *
 * @param options Shortcode options.
 *
 * @return String representation of the shortcode.
 */
export declare function string(options: ShortcodeOptions): string;
/**
 * Generate a RegExp to identify a shortcode.
 *
 * The base regex is functionally equivalent to the one found in
 * `get_shortcode_regex()` in `wp-includes/shortcodes.php`.
 *
 * Capture groups:
 *
 * 1. An extra `[` to allow for escaping shortcodes with double `[[]]`
 * 2. The shortcode name
 * 3. The shortcode argument list
 * 4. The self closing `/`
 * 5. The content of a shortcode when it wraps some content.
 * 6. The closing tag.
 * 7. An extra `]` to allow for escaping shortcodes with double `[[]]`
 *
 * @param tag Shortcode tag.
 *
 * @return Shortcode RegExp.
 */
export declare function regexp(tag: string): RegExp;
/**
 * Parse shortcode attributes.
 *
 * Shortcodes accept many types of attributes. These can chiefly be divided into
 * named and numeric attributes:
 *
 * Named attributes are assigned on a key/value basis, while numeric attributes
 * are treated as an array.
 *
 * Named attributes can be formatted as either `name="value"`, `name='value'`,
 * or `name=value`. Numeric attributes can be formatted as `"value"` or just
 * `value`.
 *
 * @param {string} text Serialised shortcode attributes.
 *
 * @return {ShortcodeAttrs} Parsed shortcode attributes.
 */
export declare const attrs: ((text: string) => ShortcodeAttrs) & import("memize").MemizeMemoizedFunction;
/**
 * Generate a Shortcode Object from a RegExp match.
 *
 * Accepts a `match` object from calling `regexp.exec()` on a `RegExp` generated
 * by `regexp()`. `match` can also be set to the `arguments` from a callback
 * passed to `regexp.replace()`.
 *
 * @param match Match array.
 *
 * @return Shortcode instance.
 */
export declare function fromMatch(match: Match): ShortcodeInstance;
/**
 * Creates a shortcode instance.
 *
 * To access a raw representation of a shortcode, pass an `options` object,
 * containing a `tag` string, a string or object of `attrs`, a string indicating
 * the `type` of the shortcode ('single', 'self-closing', or 'closed'), and a
 * `content` string.
 */
declare class Shortcode implements ShortcodeInstance {
    tag: string;
    type?: 'self-closing' | 'closed' | 'single';
    content?: string;
    attrs: ShortcodeAttrs;
    static next: typeof next;
    static replace: typeof replace;
    static string: typeof string;
    static regexp: typeof regexp;
    static attrs: ((text: string) => ShortcodeAttrs) & import("memize").MemizeMemoizedFunction;
    static fromMatch: typeof fromMatch;
    constructor(options: ShortcodeOptions);
    /**
     * Get a shortcode attribute.
     *
     * Automatically detects whether `attr` is named or numeric and routes it
     * accordingly.
     *
     * @param attr Attribute key.
     *
     * @return Attribute value.
     */
    get(attr: string | number): string | undefined;
    /**
     * Set a shortcode attribute.
     *
     * Automatically detects whether `attr` is named or numeric and routes it
     * accordingly.
     *
     * @param attr  Attribute key.
     * @param value Attribute value.
     *
     * @return Shortcode instance.
     */
    set(attr: string | number, value: string): this;
    /**
     * Transform the shortcode into a string.
     *
     * @return String representation of the shortcode.
     */
    string(): string;
}
export default Shortcode;
//# sourceMappingURL=index.d.ts.map
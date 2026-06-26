"use strict";
var __create = Object.create;
var __defProp = Object.defineProperty;
var __getOwnPropDesc = Object.getOwnPropertyDescriptor;
var __getOwnPropNames = Object.getOwnPropertyNames;
var __getProtoOf = Object.getPrototypeOf;
var __hasOwnProp = Object.prototype.hasOwnProperty;
var __export = (target, all) => {
  for (var name in all)
    __defProp(target, name, { get: all[name], enumerable: true });
};
var __copyProps = (to, from, except, desc) => {
  if (from && typeof from === "object" || typeof from === "function") {
    for (let key of __getOwnPropNames(from))
      if (!__hasOwnProp.call(to, key) && key !== except)
        __defProp(to, key, { get: () => from[key], enumerable: !(desc = __getOwnPropDesc(from, key)) || desc.enumerable });
  }
  return to;
};
var __reExport = (target, mod, secondTarget) => (__copyProps(target, mod, "default"), secondTarget && __copyProps(secondTarget, mod, "default"));
var __toESM = (mod, isNodeMode, target) => (target = mod != null ? __create(__getProtoOf(mod)) : {}, __copyProps(
  // If the importer is in node compatibility mode or this is not an ESM
  // file that has been converted to a CommonJS file using a Babel-
  // compatible transform (i.e. "__esModule" has not been set), then set
  // "default" to the CommonJS "module.exports" for node compatibility.
  isNodeMode || !mod || !mod.__esModule ? __defProp(target, "default", { value: mod, enumerable: true }) : target,
  mod
));
var __toCommonJS = (mod) => __copyProps(__defProp({}, "__esModule", { value: true }), mod);

// packages/shortcode/src/index.ts
var index_exports = {};
__export(index_exports, {
  attrs: () => attrs,
  default: () => index_default,
  fromMatch: () => fromMatch,
  next: () => next,
  regexp: () => regexp,
  replace: () => replace,
  string: () => string
});
module.exports = __toCommonJS(index_exports);
var import_memize = __toESM(require("memize"));
__reExport(index_exports, require("./types.cjs"), module.exports);
function next(tag, text, index = 0) {
  const re = regexp(tag);
  re.lastIndex = index;
  const match = re.exec(text);
  if (!match) {
    return;
  }
  if ("[" === match[1] && "]" === match[7]) {
    return next(tag, text, re.lastIndex);
  }
  const result = {
    index: match.index,
    content: match[0],
    shortcode: fromMatch(match)
  };
  if (match[1]) {
    result.content = result.content.slice(1);
    result.index++;
  }
  if (match[7]) {
    result.content = result.content.slice(0, -1);
  }
  return result;
}
function replace(tag, text, callback) {
  return text.replace(
    regexp(tag),
    // Let us use spread syntax to capture the arguments object.
    (...args) => {
      const match = args[0];
      const left = args[1];
      const right = args[7];
      if (left === "[" && right === "]") {
        return match;
      }
      const result = callback(fromMatch(args));
      return result || result === "" ? left + result + right : match;
    }
  );
}
function string(options) {
  return new Shortcode(options).string();
}
function regexp(tag) {
  return new RegExp(
    "\\[(\\[?)(" + tag + ")(?![\\w-])([^\\]\\/]*(?:\\/(?!\\])[^\\]\\/]*)*?)(?:(\\/)\\]|\\](?:([^\\[]*(?:\\[(?!\\/\\2\\])[^\\[]*)*)(\\[\\/\\2\\]))?)(\\]?)",
    "g"
  );
}
var attrs = (0, import_memize.default)((text) => {
  const named = {};
  const numeric = [];
  const pattern = /([\w-]+)\s*=\s*"([^"]*)"(?:\s|$)|([\w-]+)\s*=\s*'([^']*)'(?:\s|$)|([\w-]+)\s*=\s*([^\s'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|'([^']*)'(?:\s|$)|(\S+)(?:\s|$)/g;
  text = text.replace(/[\u00a0\u200b]/g, " ");
  let match;
  while (match = pattern.exec(text)) {
    if (match[1]) {
      named[match[1].toLowerCase()] = match[2];
    } else if (match[3]) {
      named[match[3].toLowerCase()] = match[4];
    } else if (match[5]) {
      named[match[5].toLowerCase()] = match[6];
    } else if (match[7]) {
      numeric.push(match[7]);
    } else if (match[8]) {
      numeric.push(match[8]);
    } else if (match[9]) {
      numeric.push(match[9]);
    }
  }
  return { named, numeric };
});
function fromMatch(match) {
  let type;
  if (match[4]) {
    type = "self-closing";
  } else if (match[6]) {
    type = "closed";
  } else {
    type = "single";
  }
  return new Shortcode({
    tag: match[2],
    attrs: match[3],
    type,
    content: match[5]
  });
}
var Shortcode = class {
  // Instance properties
  tag;
  type;
  content;
  attrs;
  // Static methods
  static next = next;
  static replace = replace;
  static string = string;
  static regexp = regexp;
  static attrs = attrs;
  static fromMatch = fromMatch;
  constructor(options) {
    const { tag, attrs: attributes, type, content } = options;
    this.tag = tag;
    this.type = type;
    this.content = content;
    this.attrs = {
      named: {},
      numeric: []
    };
    if (!attributes) {
      return;
    }
    if (typeof attributes === "string") {
      this.attrs = attrs(attributes);
    } else if ("named" in attributes && "numeric" in attributes && attributes.named !== void 0 && attributes.numeric !== void 0) {
      this.attrs = attributes;
    } else {
      Object.entries(attributes).forEach(([key, value]) => {
        if (value !== void 0) {
          this.set(key, String(value));
        }
      });
    }
  }
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
  get(attr) {
    if (typeof attr === "number") {
      return this.attrs.numeric[attr];
    }
    return this.attrs.named[attr];
  }
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
  set(attr, value) {
    if (typeof attr === "number") {
      this.attrs.numeric[attr] = value;
    } else {
      this.attrs.named[attr] = value;
    }
    return this;
  }
  /**
   * Transform the shortcode into a string.
   *
   * @return String representation of the shortcode.
   */
  string() {
    let text = "[" + this.tag;
    this.attrs.numeric.forEach((value) => {
      if (/\s/.test(value)) {
        text += ' "' + value + '"';
      } else {
        text += " " + value;
      }
    });
    Object.entries(this.attrs.named).forEach(([name, value]) => {
      text += " " + name + '="' + value + '"';
    });
    if ("single" === this.type) {
      return text + "]";
    } else if ("self-closing" === this.type) {
      return text + " /]";
    }
    text += "]";
    if (this.content) {
      text += this.content;
    }
    return text + "[/" + this.tag + "]";
  }
};
var index_default = Shortcode;
// Annotate the CommonJS export names for ESM import in node:
0 && (module.exports = {
  attrs,
  fromMatch,
  next,
  regexp,
  replace,
  string,
  ...require("./types.cjs")
});
//# sourceMappingURL=index.cjs.map

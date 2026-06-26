// packages/shortcode/src/index.ts
import memize from "memize";
export * from "./types.mjs";
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
var attrs = memize((text) => {
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
export {
  attrs,
  index_default as default,
  fromMatch,
  next,
  regexp,
  replace,
  string
};
//# sourceMappingURL=index.mjs.map

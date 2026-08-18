/**
 * Client-side sanitizer for raw embed markup shown in the Divi 4 Visual Builder
 * preview.
 *
 * Mirrors the server-side INFTNC\Modules\Sanitizer\EmbedKses: keep legitimate
 * <iframe> embeds, drop <script>, event handlers, and any non-http(s) URL so
 * stored markup cannot execute inside the builder (stored XSS).
 */

const ALLOWED_IFRAME_ATTRS = [
  'src', 'width', 'height', 'frameborder', 'marginwidth', 'marginheight',
  'scrolling', 'title', 'name', 'id', 'class', 'style', 'allow',
  'allowfullscreen', 'loading', 'referrerpolicy', 'sandbox', 'role',
  'aria-hidden', 'aria-label',
];

export const sanitizeEmbedHtml = (html) => {
  if (typeof html !== 'string' || html === '') {
    return '';
  }

  const doc = new DOMParser().parseFromString(html, 'text/html');
  const out = [];

  doc.querySelectorAll('iframe').forEach((node) => {
    const src = node.getAttribute('src') || '';

    let url;
    try {
      url = new URL(src, window.location.origin);
    } catch (e) {
      return; // Unparseable / malformed → drop.
    }
    if (url.protocol !== 'http:' && url.protocol !== 'https:') {
      return; // javascript:, data:, etc. → drop.
    }

    const iframe = document.createElement('iframe');
    ALLOWED_IFRAME_ATTRS.forEach((attr) => {
      const val = node.getAttribute(attr);
      if (val !== null) {
        iframe.setAttribute(attr, val);
      }
    });
    out.push(iframe.outerHTML);
  });

  return out.join('');
};

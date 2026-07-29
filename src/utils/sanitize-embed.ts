/**
 * Client-side sanitizer for raw embed markup shown in the Visual Builder preview.
 *
 * Mirrors the server-side INFTNC\Modules\Sanitizer\EmbedKses: keep legitimate
 * <iframe> embeds, drop <script>, event handlers, and any non-http(s) URL so
 * stored markup cannot execute inside the builder (stored XSS).
 *
 * The iframe is rebuilt from an attribute allowlist, so unknown attributes
 * (including on* event handlers) are discarded, and the src is validated to be
 * an http/https URL — javascript:, data:, and relative-protocol tricks are
 * rejected.
 */

const ALLOWED_IFRAME_ATTRS = [
  'src', 'width', 'height', 'frameborder', 'marginwidth', 'marginheight',
  'scrolling', 'title', 'name', 'id', 'class', 'style', 'allow',
  'allowfullscreen', 'loading', 'referrerpolicy', 'sandbox', 'role',
  'aria-hidden', 'aria-label',
];

export const sanitizeEmbedHtml = (html: string): string => {
  if (typeof html !== 'string' || html === '') {
    return '';
  }

  const doc = new DOMParser().parseFromString(html, 'text/html');
  const out: string[] = [];

  doc.querySelectorAll('iframe').forEach((node) => {
    const src = node.getAttribute('src') || '';

    let url: URL;
    try {
      url = new URL(src, window.location.origin);
    } catch {
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

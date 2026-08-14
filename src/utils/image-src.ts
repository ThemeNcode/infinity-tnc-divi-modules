/**
 * Normalize a `divi/upload` field value to a URL string.
 *
 * The upload field stores its value either as a plain URL string or, when an image
 * is inserted from the WordPress media library, as an object such as
 * `{ url: '...', id: 123, ... }`. Rendering the object directly gives a broken
 * `<img src>` (and, on the server, an "Array to string conversion" warning), so
 * callers should route the value through this helper first.
 */
export const resolveImageSrc = (value: unknown): string => {
  if (typeof value === 'string') {
    return value;
  }

  if (value && typeof value === 'object') {
    const obj = value as Record<string, unknown>;
    if (typeof obj.url === 'string') {
      return obj.url;
    }
    if (typeof obj.src === 'string') {
      return obj.src;
    }
  }

  return '';
};

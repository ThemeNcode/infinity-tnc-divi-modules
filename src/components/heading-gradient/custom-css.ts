// WordPress dependencies.
import { __ } from '@wordpress/i18n';

import metadata from './module.json';

const customCssFields = (metadata as any).customCssFields as Record<'title', { subName: string, selectorSuffix: string, label: string }>;

if (customCssFields && customCssFields.title) {
  customCssFields.title.label = __('Heading Title', 'infinity-tnc-divi-modules');
}

export const cssFields = { ...customCssFields };

// WordPress dependencies.
import { __ } from '@wordpress/i18n';

import metadata from './module.json';


const customCssFields = metadata.customCssFields as Record<'title' | 'content', { subName: string, selectorSuffix: string, label: string }>;

customCssFields.title.label            = __('Title', 'infinity-tnc-divi-modules');
customCssFields.content.label          = __('Content', 'infinity-tnc-divi-modules');

export const cssFields = { ...customCssFields };

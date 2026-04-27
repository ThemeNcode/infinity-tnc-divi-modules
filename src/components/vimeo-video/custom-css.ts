// WordPress dependencies.
import { __ } from '@wordpress/i18n';

import metadata from './module.json';


const customCssFields = metadata.customCssFields as Record<'iframe', { subName: string, selectorSuffix: string, label: string }>;

customCssFields.iframe.label = __('Iframe', 'infinity-tnc-divi-modules');

export const cssFields = { ...customCssFields };

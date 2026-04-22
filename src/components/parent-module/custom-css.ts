// WordPress dependencies.
import { __ } from '@wordpress/i18n';

import metadata from './module.json';


const customCssFields = metadata.customCssFields as Record<'contentContainer' | 'title' | 'content' | 'icon', { subName: string, selectorSuffix: string, label: string }>;

customCssFields.contentContainer.label = __('Content Container', 'infinity-tnc-divi-modules');
customCssFields.title.label            = __('Title', 'infinity-tnc-divi-modules');
customCssFields.content.label          = __('Content', 'infinity-tnc-divi-modules');
customCssFields.icon.label             = __('Icon', 'infinity-tnc-divi-modules');

export const cssFields = { ...customCssFields };

import { __ } from '@wordpress/i18n';

import metadata from './module.json';


const customCssFields = metadata.customCssFields as Record<'before_text' | 'home_text' | 'seperator' | 'link_text', { subName: string, selectorSuffix: string, label?: string }>;

customCssFields.before_text.label = __('Before Text', 'infinity-tnc-divi-modules');
customCssFields.home_text.label   = __('Home Text', 'infinity-tnc-divi-modules');
customCssFields.seperator.label   = __('Separator', 'infinity-tnc-divi-modules');
customCssFields.link_text.label   = __('Link Text', 'infinity-tnc-divi-modules');

export const cssFields = { ...customCssFields };

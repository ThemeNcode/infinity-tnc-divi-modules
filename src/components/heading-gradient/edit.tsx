import React, { type ReactElement } from 'react';

import { type Module } from '@divi/types';
import { ModuleContainer } from '@divi/module';

import { moduleClassnames } from './module-classnames';
import { ModuleScriptData } from './module-script-data';
import { ModuleStyles } from './styles';

import { HeadingGradientAttrs, HeadingGradientEditProps } from './types';

/**
 * Heading Gradient edit component for the Visual Builder.
 *
 * @param {HeadingGradientEditProps} props The module edit component props.
 *
 * @returns {ReactElement}
 */
const HeadingGradientEdit = (props: HeadingGradientEditProps): ReactElement => {
  const {
    attrs,
    id,
    name,
    elements,
  } = props;

  const data        = attrs?.headingGradientData?.innerContent?.desktop?.value || {};
  const title       = data.gradient_title || 'My Awesome Heading with Gradient';

  // header_level comes from Divi's built-in font/header settings
  const headerLevel = (attrs as any)?.module?.advanced?.header?.title?.header_level?.desktop?.value || 'h1';

  // Validate heading tag to avoid invalid element crash
  const validTags   = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
  const HeadingTag  = (validTags.includes(headerLevel) ? headerLevel : 'h1') as keyof JSX.IntrinsicElements;

  return (
    <ModuleContainer
      id={id}
      name={name}
      attrs={attrs}
      elements={elements}
      classnamesFunction={moduleClassnames}
      scriptDataComponent={ModuleScriptData}
      stylesComponent={ModuleStyles}
    >
      {elements.styleComponents({
        attrName: 'module',
      })}
      {elements.styleComponents({
        attrName: 'title',
      })}
      <HeadingTag className="inftnc_gradient_title et_pb_module_header">
        {title}
      </HeadingTag>
    </ModuleContainer>
  );
};

export { HeadingGradientEdit };

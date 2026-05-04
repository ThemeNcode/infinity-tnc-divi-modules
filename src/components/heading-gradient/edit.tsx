import React, { type ReactElement } from 'react';

import { type Module } from '@divi/types';
import { ModuleContainer } from '@divi/module';
import { getAttrByMode } from '@divi/module-utils';

import { moduleClassnames } from './module-classnames';
import { ModuleScriptData } from './module-script-data';
import { ModuleStyles } from './styles';

import { HeadingGradientAttrs, HeadingGradientEditProps } from './types';

const HeadingGradientEdit = (props: HeadingGradientEditProps): ReactElement => {
  const {
    attrs,
    id,
    name,
    elements,
  } = props;

  const headingLevel = getAttrByMode(attrs?.title?.decoration?.font?.font)?.headingLevel ?? 'h1';

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
      {(elements as any).render({
        attrName: 'title',
        tagName: headingLevel,
      })}
    </ModuleContainer>
  );
};

export { HeadingGradientEdit };

import React, { ReactElement } from 'react';
import { ChildModulesContainer, ModuleContainer } from '@divi/module';

import { SocialShareEditProps } from './types';
import { ModuleStyles } from './styles';
import { ModuleScriptData } from './module-script-data';
import { moduleClassnames } from './module-classnames';

export const SocialShareEdit = (props: SocialShareEditProps): ReactElement => {
  const {
    attrs,
    elements,
    id,
    name,
    childrenIds,
  } = props;

  return (
    <ModuleContainer
      attrs={attrs}
      elements={elements}
      id={id}
      name={name}
      stylesComponent={ModuleStyles}
      scriptDataComponent={ModuleScriptData}
      classnamesFunction={moduleClassnames}
    >
      {elements.styleComponents({
        attrName: 'module',
      })}
      <div className="inftnc_social_share_wrapper">
        <ChildModulesContainer ids={childrenIds} />
      </div>
    </ModuleContainer>
  );
};

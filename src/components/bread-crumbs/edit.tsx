import React, { type ReactElement } from 'react';

import { type Module } from '@divi/types';
import { ModuleContainer } from '@divi/module';

import { moduleClassnames } from './module-classnames';
import { ModuleScriptData } from './module-script-data';
import { ModuleStyles } from './styles';
import { BreadCrumbsAttrs } from './types';

export type BreadCrumbsEditProps = Module.Edit.Props<BreadCrumbsAttrs>;

const BreadCrumbsEdit = (props: BreadCrumbsEditProps): ReactElement => {
  const {
    attrs,
    id,
    name,
    elements,
  } = props;

  const breadCrumbsData  = attrs?.breadCrumbsData?.innerContent?.desktop?.value || {};
  const homeText         = breadCrumbsData.home_text || 'Home';
  const beforeText       = breadCrumbsData.before_text || '';
  const useBeforeIcon    = breadCrumbsData.use_before_icon === 'on';

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
      <div className="inftnc_bread_crumbs_container">
        {useBeforeIcon && <span className="inftnc_before_icon" />}
        {beforeText && <span className="inftnc_before">{beforeText}</span>}
        <span className="home">
          <a href="#">{homeText}</a>
        </span>
        <span className="inftnc_separator" />
        <span className="inftnc_current">Breadcrumbs</span>
      </div>
    </ModuleContainer>
  );
};

export { BreadCrumbsEdit };

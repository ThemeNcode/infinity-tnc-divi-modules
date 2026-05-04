/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { type ReactElement } from 'react';

import { ModuleContainer } from '@divi/module';
import { processFontIcon } from '@divi/icon-library';

import { moduleClassnames } from './module-classnames';
import { ModuleScriptData } from './module-script-data';
import { ModuleStyles } from './styles';
import { BreadCrumbsEditProps } from './types';

const BreadCrumbsEdit = (props: BreadCrumbsEditProps): ReactElement => {
  const {
    attrs,
    id,
    name,
    elements,
  } = props;

  const breadCrumbsData = attrs?.breadCrumbsData?.innerContent?.desktop?.value || {};
  const homeText        = breadCrumbsData.home_text || 'Home';
  const beforeText      = breadCrumbsData.before_text || '';
  const useBeforeIcon   = breadCrumbsData.use_before_icon === 'on';
  const defaultIcon = { unicode: '&#x35;', weight: '400', type: 'divi' };
  const separatorIcon   = breadCrumbsData.seperator_icon || defaultIcon;
  const beforeTextIcon  = breadCrumbsData.before_text_icon || defaultIcon;

  const separatorChar  = separatorIcon  ? processFontIcon(separatorIcon  as any) : null;
  const beforeIconChar = beforeTextIcon ? processFontIcon(beforeTextIcon as any) : null;

  return (
    <ModuleContainer
      id={id}
      name={name}
      attrs={attrs as any}
      elements={elements as any}
      classnamesFunction={moduleClassnames as any}
      scriptDataComponent={ModuleScriptData as any}
      stylesComponent={ModuleStyles as any}
    >
      {(elements as any).styleComponents({
        attrName: 'module',
      })}
      <div className="inftnc_bread_crumbs_container">
        {useBeforeIcon && beforeIconChar && (
          <span className="inftnc_before_icon et-pb-icon">{beforeIconChar}</span>
        )}
        {beforeText && <span className="inftnc_before">{beforeText}</span>}
        <span className="home">
          <a href="#">{homeText}</a>
        </span>
        {separatorChar && (
          <span className="inftnc_separator et-pb-icon">{separatorChar}</span>
        )}
        <span className="inftnc_current">Breadcrumbs</span>
      </div>
    </ModuleContainer>
  );
};

export { BreadCrumbsEdit };

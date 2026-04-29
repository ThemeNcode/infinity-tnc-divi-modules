/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { type ReactElement } from 'react';

import { ModuleContainer } from '@divi/module';

import { moduleClassnames } from './module-classnames';
import { ModuleScriptData } from './module-script-data';
import { ModuleStyles } from './styles';
import { TypeWriterAttrs } from './types';

type TypeWriterEditProps = {
  attrs: TypeWriterAttrs;
  id: string;
  name: string;
  elements: any;
};

const TypeWriterEdit = (props: TypeWriterEditProps): ReactElement => {
  const {
    attrs,
    id,
    name,
    elements,
  } = props;

  const data        = attrs?.typewriterData?.innerContent?.desktop?.value || {};
  const beforeText  = data.before_text  || '';
  const typingText  = data.typing_text  || 'Typewriter|Typing Animation';
  const afterText   = data.after_text   || '';

  const headerLevel = (attrs?.module as any)?.advanced?.header?.title?.header_level?.desktop?.value || 'h1';
  const HeadingTag  = headerLevel as keyof JSX.IntrinsicElements;

  // Show first typing string as static preview in VB.
  const previewText = (typingText || '').split('|').filter((t: string) => t.trim() !== '')[0] || '';

  return (
    <ModuleContainer
      id={id}
      name={name}
      attrs={attrs as any}
      elements={elements}
      classnamesFunction={moduleClassnames as any}
      scriptDataComponent={ModuleScriptData as any}
      stylesComponent={ModuleStyles as any}
    >
      {(elements as any).styleComponents({
        attrName: 'module',
      })}
      <div className="inftnc_typewriter_wrapper">
        <HeadingTag className="inftnc_typewriter_main_title">
          {beforeText && <span className="inftnc_before_text">{beforeText}</span>}
          <span className="inftnc_typewriter_text">{previewText}</span>
          {afterText && <span className="inftnc_after_text">{afterText}</span>}
        </HeadingTag>
      </div>
    </ModuleContainer>
  );
};

export { TypeWriterEdit };

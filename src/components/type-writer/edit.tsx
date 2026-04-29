/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { type ReactElement, useRef, useEffect } from 'react';
import TypewriterCore from 'typewriter-effect/dist/core';

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

  const data            = attrs?.typewriterData?.innerContent?.desktop?.value || {};
  const beforeText      = data.before_text      || '';
  const typingText      = data.typing_text       || 'Typewriter|Typing Animation';
  const afterText       = data.after_text        || '';
  const typingSpeed     = data.typing_speed      || '75';
  const typingBackspeed = data.typing_backspeed  || '75';
  const pauseFor        = data.pause_for         || '1500';
  const typingCursor    = data.typing_cursor     || '|';
  const typingLoop      = data.typing_loop       || 'on';

  const headerLevel = (attrs?.module as any)?.advanced?.header?.title?.header_level?.desktop?.value || 'h1';
  const HeadingTag  = headerLevel as keyof JSX.IntrinsicElements;

  const wrapperRef  = useRef<HTMLSpanElement>(null);
  const twRef       = useRef<any>(null);

  useEffect(() => {
    if (!wrapperRef.current) return;

    const strings  = (typingText || '').split('|').filter((t: string) => t.trim() !== '');
    const loopVal  = typingLoop === 'on';

    // Destroy previous instance.
    if (twRef.current) {
      twRef.current.stop();
      twRef.current = null;
    }
    if (wrapperRef.current) {
      wrapperRef.current.innerHTML = '';
    }

    twRef.current = new TypewriterCore(wrapperRef.current, {
      strings,
      autoStart:   true,
      loop:        loopVal,
      delay:       parseInt(typingSpeed, 10)     || 75,
      deleteSpeed: parseInt(typingBackspeed, 10) || 75,
      pauseFor:    parseInt(pauseFor, 10)        || 1500,
      cursor:      typingCursor,
    });

    return () => {
      if (twRef.current) {
        twRef.current.stop();
        twRef.current = null;
      }
      if (wrapperRef.current) {
        wrapperRef.current.innerHTML = '';
      }
    };
  }, [typingText, typingSpeed, typingBackspeed, pauseFor, typingCursor, typingLoop]);

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
          <span className="inftnc_typewriter_text" ref={wrapperRef}></span>
          {afterText && <span className="inftnc_after_text">{afterText}</span>}
        </HeadingTag>
      </div>
    </ModuleContainer>
  );
};

export { TypeWriterEdit };

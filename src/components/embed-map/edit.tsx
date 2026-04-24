import React, { type ReactElement } from 'react';

import { type Module } from '@divi/types';
import { ModuleContainer } from '@divi/module';

import { moduleClassnames } from './module-classnames';
import { ModuleScriptData } from './module-script-data';
import { ModuleStyles } from './styles';

import { EmbedMapAttrs } from './types';

export type EmbedMapEditProps = Module.Edit.Props<EmbedMapAttrs>;

/**
 * Embed Map edit component of the Visual Builder.
 *
 * This component will be used to render the module in the Visual Builder.
 *
 * @since ??
 *
 * @param {EmbedMapEditProps} props The module edit component props.
 *
 * @returns {ReactElement}
 */
const EmbedMapEdit = (props: EmbedMapEditProps): ReactElement => {
  const {
    attrs,
    id,
    name,
    elements,
  } = props;

  // Get attribute values from the compound sourceData attribute.
  const sourceData        = attrs?.sourceData?.innerContent?.desktop?.value || {};
  const sourceType        = sourceData?.sourceType || 'latitude_longitude';
  const latitudeLongitude = sourceData?.latitudeLongitude || '40.658620799731196,-73.99475680760217';
  const mapZoom           = sourceData?.mapZoom || '14';
  const embedCode         = sourceData?.embedCode || '';

  // Build map output based on source type.
  let mapContent: ReactElement | null = null;

  if ('emebed_code' === sourceType && embedCode) {
    mapContent = <div dangerouslySetInnerHTML={{ __html: embedCode }} />;
  } else if ('latitude_longitude' === sourceType) {
    const iframeSrc = `https://maps.google.com/maps?q=${latitudeLongitude}&z=${mapZoom}&output=embed`;
    mapContent = (
      <iframe
        src={iframeSrc}
        frameBorder="0"
        scrolling="no"
        marginHeight={0}
        marginWidth={0}
      />
    );
  }

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
      <div
        className="inftnc_embed_map"
        style={{ width: '100%' }}
      >
        {mapContent}
      </div>
    </ModuleContainer>
  );
};

export { EmbedMapEdit };

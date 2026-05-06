import React, { ReactElement } from 'react';
import Slider from 'react-slick';
import { ChildModulesContainer, ModuleContainer } from '@divi/module';
import { getAttrByMode } from '@divi/module-utils';

import { ImageCarouselEditProps, ImageCarouselInnerContent } from './types';
import { ModuleStyles } from './styles';
import { ModuleScriptData } from './module-script-data';
import { moduleClassnames } from './module-classnames';

import './style.scss';

export const ImageCarouselEdit = (props: ImageCarouselEditProps): ReactElement => {
  const {
    attrs,
    elements,
    id,
    name,
    childrenIds,
  } = props;

  const data = (getAttrByMode(attrs?.imageCarouselData?.innerContent) ?? {}) as ImageCarouselInnerContent;

  const slidesToShow   = Math.max( 1, parseInt( data.slides_to_show   ?? '3', 10 ) || 3 );
  const slidesToScroll = Math.max( 1, parseInt( data.slides_to_scroll ?? '1', 10 ) || 1 );
  const speed          = parseInt( data.animation_speed ?? '300', 10 ) || 300;
  const autoplaySpeed  = parseInt( data.autoplay_speed  ?? '3000', 10 ) || 3000;
  const autoplay       = data.autoplay       !== 'off';
  const infinite       = data.infinite       !== 'off';
  const dots           = data.use_pagination !== 'off';
  const arrows         = data.use_navigation !== 'off';
  const rtl            = data.rtl            === 'on';

  const slickSettings = {
    slidesToShow,
    slidesToScroll,
    speed,
    autoplay,
    autoplaySpeed,
    infinite,
    dots,
    arrows,
    rtl,
    responsive: [
      { breakpoint: 980, settings: { slidesToShow: Math.min( slidesToShow, 2 ) } },
      { breakpoint: 767, settings: { slidesToShow: 1 } },
    ],
  };

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
      <div className="inftnc_carousels_image_wrapper">
        {childrenIds && childrenIds.length > 0 ? (
          <Slider {...slickSettings}>
            {childrenIds.map( ( childId: string ) => (
              <div key={childId}>
                <ChildModulesContainer ids={[ childId ]} />
              </div>
            ) )}
          </Slider>
        ) : (
          <ChildModulesContainer ids={childrenIds} />
        )}
      </div>
    </ModuleContainer>
  );
};

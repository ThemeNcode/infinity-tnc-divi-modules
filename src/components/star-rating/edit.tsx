/* eslint-disable @typescript-eslint/no-explicit-any */
import React, { type ReactElement } from 'react';
import StarRatings from 'react-svg-star-rating';

import { ModuleContainer } from '@divi/module';

import { moduleClassnames } from './module-classnames';
import { ModuleScriptData } from './module-script-data';
import { ModuleStyles } from './styles';
import { StarRatingAttrs } from './types';

type StarRatingEditProps = {
  attrs: StarRatingAttrs;
  id: string;
  name: string;
  elements: any;
};

const StarRatingEdit = (props: StarRatingEditProps): ReactElement => {
  const {
    attrs,
    id,
    name,
    elements,
  } = props;

  const data           = attrs?.starRatingData?.innerContent?.desktop?.value || {};
  const title          = data.title             || '';
  const countStar      = parseInt(data.count_star || '5', 10) || 5;
  const rating         = parseFloat(data.rating  || '5')      || 5;
  const showNumber     = data.show_rating_number === 'on';
  const iconColor      = data.icon_color        || '#EBC03F';
  const emptyColor     = data.empty_color       || '#AAAAAA';
  const starSize       = parseInt(data.star_size || '25', 10) || 25;
  const gap            = parseInt(data.gap       || '0',  10) || 0;
  const starAlignment  = data.star_alignment     || 'left';

  const headerLevel    = (attrs?.module as any)?.advanced?.header?.title?.header_level?.desktop?.value || 'h1';
  const HeadingTag     = headerLevel as keyof JSX.IntrinsicElements;

  const gapStyle = gap > 0 ? { '--star-gap': `${gap}px` } as React.CSSProperties : {};

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
      <div className="inftnc_star_rating_wrapper">
        <div className="start_rating_inner">
          {title && (
            <div className="inftnc_rating_title-wrap">
              <HeadingTag className="inftnc_rating_title">{title}</HeadingTag>
            </div>
          )}
          <div
            className={`inftnc_rating_inner_wrapper inftnc_rating_star_alignment_${starAlignment}`}
            style={gapStyle}
          >
            <StarRatings
              isReadOnly
              count={countStar}
              initialRating={rating}
              unit="float"
              roundedCorner={true}
              activeColor={iconColor}
              emptyColor={emptyColor}
              starClassName="jq-star"
              size={starSize}
            />
            {showNumber && (
              <div className="inftnc_rating_number_wrapper">
                <span className="inftnc_star_rating_number">
                  ({rating} / {countStar})
                </span>
              </div>
            )}
          </div>
        </div>
      </div>
    </ModuleContainer>
  );
};

export { StarRatingEdit };

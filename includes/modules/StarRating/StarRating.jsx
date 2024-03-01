// External Dependencies
import React, { Component} from 'react';
import StarRatings from "react-svg-star-rating";

// Internal Dependencies
import './style.css';

class StarRating extends Component {

static slug = 'inftnc_star_rating';

static css(props, moduleInfo) {

    const utils         = window.ET_Builder.API.Utils;
    const additionalCss = [];

    if (props.gap) {
      additionalCss.push([{
        selector:    '%%order_class%% .jq-star',
        declaration: `margin-left: ${props.gap}px;`,
      }]);
    }

    return additionalCss;
    
  }

  render() {

    const {rating,star_size,icon_color,empty_color,title,count_star,show_rating_number}       = this.props;
    return (
      <div className="inftnc_star_rating_wrapper">
					<div className="start_rating_inner">
             <div className="inftnc_rating_title">
                <h1>{title}</h1>
             </div>
            <div className="inftnc_rating_inner_wrapper">
                <StarRatings
                      isReadOnly
                      count={count_star}
                      initialRating={rating}
                      unit="float"
                      roundedCorner={true}
                      activeColor={icon_color}
                      emptyColor={empty_color}
                      starClassName="jq-star"
                      size={star_size}
                  />
                <div className="inftnc_rating_number_wrapper">
                    { 'on' === show_rating_number ? (
                        <span className="inftnc_star_rating_number">({rating} / {count_star})</span>
                    ) : (
                       null
                    )}
                </div>
            </div>
					</div>
			</div>
    );
  }
}

export default StarRating;

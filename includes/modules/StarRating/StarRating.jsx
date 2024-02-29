// External Dependencies
import React, { Component} from 'react';
import StarRatings from "react-svg-star-rating";

// Internal Dependencies
import './style.css';

class StarRating extends Component {

static slug = 'inftnc_star_rating';

  render() {

    const {rating,star_size,icon_color,hover_color,empty_color}       = this.props;
    return (
      <div className="inftnc_star_rating_wrapper">
					<div className="start_rating_inner">
           <StarRatings
              isReadOnly
              initialRating={rating}
              unit="float"
              roundedCorner={true}
              activeColor={icon_color}
              emptyColor={empty_color}
              starClassName="jq-star"
              size={star_size}
           />
					</div>
			</div>
    );
  }
}

export default StarRating;

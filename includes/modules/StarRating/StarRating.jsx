// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class StarRating extends Component {

  static slug = 'inftnc_star_rating';

  render() {
    const Content = this.props.content;

    return (
      <h1>
        <Content/>
      </h1>
    );
  }
}

export default StarRating;

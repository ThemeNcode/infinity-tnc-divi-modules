// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class BreadCrumbs extends Component {

  static slug = 'inftnc_bread_crumbs';

  render() {
    const Content = this.props.content;

    return (
      <h1>
        <Content/>
      </h1>
    );
  }
}

export default BreadCrumbs;

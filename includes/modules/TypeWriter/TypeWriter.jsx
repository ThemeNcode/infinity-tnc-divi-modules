// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class TypeWriter extends Component {

  static slug = 'inftnc_type_writer';

  render() {
    const Content = this.props.content;

    return (
      <h1>
        <Content/>
      </h1>
    );
  }
}

export default TypeWriter;

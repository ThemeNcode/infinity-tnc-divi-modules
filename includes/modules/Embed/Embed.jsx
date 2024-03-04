// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class EmbedIframe extends Component {

  static slug = 'inftnc_embed_iframe';

  render() {
    const Content = this.props.content;

    return (
      <h1>
        <Content/>
      </h1>
    );
  }
}

export default EmbedIframe;

// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class YoutubeEmbed extends Component {

  static slug = 'inftnc_youtube_embed';

  render() {
    const Content = this.props.content;

    return (
      <h1>
        <Content/>
      </h1>
    );
  }
}

export default YoutubeEmbed;

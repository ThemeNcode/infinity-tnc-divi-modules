// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class VimeoVideo extends Component {

  static slug = 'inftnc_vimeo_video';

  render() {
    const Content = this.props.content;

    return (
      <h1>
        <Content/>
      </h1>
    );
  }
}

export default VimeoVideo;

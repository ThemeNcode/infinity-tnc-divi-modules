// External Dependencies
import React, { Component } from 'react';


class SocialShare extends Component {

  static slug = 'inftnc_social_share';

  /**
   * Module render in VB
   * Basically DICM_CTA_Parent->render() equivalent in JSX
   */
  render() {
    return (
      <div>
        <h2 className="dicm-title">{this.props.title}</h2>
        <div className="dicm-content">{this.props.content}</div>
      </div>
    );
  }
}

export default SocialShare;
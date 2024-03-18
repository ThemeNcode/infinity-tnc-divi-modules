// External Dependencies
import React, { Component } from 'react';
import SocialShareChild from '../SocialShareChild/SocialShareChild';


class SocialShare extends Component {

  static slug = 'inftnc_social_share';


  render() {

    return (
          <div className="inftnc_social_share_wrapper">{this.props.content}
            <SocialShareChild content={this.props.content}></SocialShareChild>
          </div>
          
    );
  }
}

export default SocialShare;
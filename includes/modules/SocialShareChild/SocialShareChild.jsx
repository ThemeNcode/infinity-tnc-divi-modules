// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';

class SocialShareChild extends Component {

  static slug = 'inftnc_social_share_child';

  render() {
    console.log(this.props.content)
    return (
        
        <div className="inftnc_share_button">Social</div>
    );
  }
}

export default SocialShareChild;
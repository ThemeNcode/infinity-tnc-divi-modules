import React, { Component } from 'react';
import './style.css';

class SocialShareChild extends Component {

  static slug = 'inftnc_social_share_child';


  render() {
    const { social_share } = this.props; 
    const buttonLayout = this.props.layout;
    return (
      <div className="inftnc_share_button">
           {(() => {
            switch(social_share) {
              case 'facebook':
                return ( 
                  <a
                    className="inftnc_share_link inftnc_fb_share_link"
                    href={`#`}
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    <span className="inftnc_social_text inftnc_fb_text">Share On Facebook</span>
                    <span className="inftnc_social_icon inftnc_social_fb"></span>
                    
                  </a> )
              case 'whatsapp':
                return (<a
                  className="inftnc_share_link inftnc_whatsapp_share_link"
                  href={`#`}
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  <span className="inftnc_social_text inftnc_whatsapp_text">Share On Whatsapp</span>
                  <span className="inftnc_social_icon inftnc_social_whatsapp"></span>
                </a> )
              case 'twitter':
                return (<a
                  className="inftnc_share_link inftnc_twitter_share_link"
                  href={`#`}
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  <span className="inftnc_social_text inftnc_twitter_text">Share On X</span>
                  <span className="inftnc_social_icon inftnc_social_twiiter et-pb-icon">&#xe094;</span>
                </a> )
               case 'pinterest':
                  return (<a
                    className="inftnc_share_link inftnc_pinterest_share_link"
                    href={`#`}
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    <span className="inftnc_social_text inftnc_pinterest_text">Share On Pinterest</span>
                    <span className="inftnc_social_icon inftnc_soical_pinterest"></span>
                  </a> )
                 case 'linekdin':
                    return (<a
                      className="inftnc_share_link inftnc_linekdin_share_link"
                      href={`#`}
                      target="_blank"
                      rel="noopener noreferrer"
                    >
                      <span className="inftnc_social_text inftnc_linekdin_text">Share On Linekdin</span>
                      <span className="inftnc_social_icon inftnc_soical_linekdin"></span>
                    </a> )
                 case 'telegram':
                    return (<a
                      className="inftnc_share_link inftnc_telegram_share_link"
                      href={`#`}
                      target="_blank"
                      rel="noopener noreferrer"
                    >
                      <span className="inftnc_social_text inftnc_telegram_text">Share On Telegram</span>
                      <span className="inftnc_social_icon inftnc_soical_telegram"></span>
                    </a> )
                  case 'reddit':
                      return (<a
                        className="inftnc_share_link inftnc_reddit_share_link"
                        href={`#`}
                        target="_blank"
                        rel="noopener noreferrer"
                      >
                        <span className="inftnc_social_text inftnc_reddit_text">Share On Reddit</span>
                        <span className="inftnc_social_icon inftnc_soical_reddit"></span>
                      </a> )
                  case 'tumblr':
                        return (<a
                          className="inftnc_share_link inftnc_tumblr_share_link"
                          href={`#`}
                          target="_blank"
                          rel="noopener noreferrer"
                        >
                          <span className="inftnc_social_text inftnc_tumblr_text">Share On Tumblr</span>
                          <span className="inftnc_social_icon inftnc_soical_tumblr"></span>
                      </a> )
                  case 'email':
                        return (<a
                          className="inftnc_share_link inftnc_email_share_link"
                          href={`#`}
                          target="_blank"
                          rel="noopener noreferrer"
                        >
                          <span className="inftnc_social_text inftnc_email_text">Share On Email</span>
                          <span className="inftnc_social_icon inftnc_soical_email"><i className="fas fa-envelope"></i></span>
                      </a> )
                   case 'blogger':
                        return (<a
                          className="inftnc_share_link inftnc_blogger_share_link"
                          href={`#`}
                          target="_blank"
                          rel="noopener noreferrer"
                        >
                          <span className="inftnc_social_text inftnc_blogger_text">Share On Blogger</span>
                          <span className="inftnc_social_icon inftnc_soical_blogger"></span>
                      </a> )
              default:
                return null
            }
       })()}
      </div>
    );
  }
}

export default SocialShareChild;

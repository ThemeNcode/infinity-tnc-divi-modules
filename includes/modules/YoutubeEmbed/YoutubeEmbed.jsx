// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class YoutubeEmbed extends Component {

  static slug = 'inftnc_youtube_embed';

  render() {

    const {video_type,video_method,youtube_url,youtube_id,youtube_embed,video_start,video_end,autoplay,mute,loop,player_control,video_rel}  = this.props;
    
    let inftncYoutubeIframe;

    if(video_type === 'video' && video_method === 'video_url') {
         const iframeSrc = `https://www.youtube.com/embed/z8uxAkjll5g`;
         inftncYoutubeIframe = <iframe src={iframeSrc} title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>;
    }

    return (

        <div className="inftnc_youtube_embed_wrapper">
            {inftncYoutubeIframe}
        </div>
    );
  }
}

export default YoutubeEmbed;

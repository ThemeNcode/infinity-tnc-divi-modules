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

        function getYouTubeVideoId(url) {
            const regex = /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})$/;
            const match = url.match(regex);
            return match ? match[1] : null;
        }
        
        const videoId = getYouTubeVideoId(youtube_url);
        
         const iframeSrc = `https://www.youtube.com/embed/${videoId}`;
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

// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';

class YoutubeEmbed extends Component {

  static slug = 'inftnc_youtube_embed';

  render() {
    const { video_type, video_method, youtube_url } = this.props;
    
    let inftncYoutubeIframe = null;

    if (video_type === 'video' && video_method === 'video_url' && youtube_url) {

      const videoId = this.getYouTubeVideoId(youtube_url);

      console.log(videoId);
      
      if (videoId) {

        const iframeSrc = `https://www.youtube.com/embed/${videoId}`;

        inftncYoutubeIframe = (
          <iframe 
            src={iframeSrc} 
            title="YouTube video player" 
            frameBorder="0" 
            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowFullScreen
          ></iframe>
        );
      }
    }

    return (

      <div className="inftnc_youtube_embed_wrapper">
          {inftncYoutubeIframe}
      </div>

    );
  }

  getYouTubeVideoId(url) {
    console.log(url);
    const regex = /(?:youtube(?:-nocookie)?\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^“&?\/ ]{11})/i;
    const match = url.match(regex);
    console.log(match);
    return match ? match[1] : null;
  }

  getYouTubeVideolistId(url) {
    const regex = /(?:youtube(?:-nocookie)?\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]list=)|youtu\.be\/)([^“&?\/ ]{34})/i;
    const match = url.match(regex);
    return match ? match[1] : null;
  }

}

export default YoutubeEmbed;

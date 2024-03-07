// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';

class YoutubeEmbed extends Component {

  static slug = 'inftnc_youtube_embed';

  render() {
    const { video_type, video_method, youtube_url,youtube_id,youtube_embed,video_start,video_end,autoplay,mute,loop,player_control,video_rel} = this.props;
    
    let autoplayValue;
     //Autoplay Value
    ( 'on' === autoplay ) ? ( autoplayValue = 1 ) : ( autoplayValue = 0 );
		//Mute Value 
    let muteValue;
		( 'on' === mute ) ? ( muteValue = 1 ) : ( muteValue = 0 );
		//Loop Value 
    let loopValue;
		( 'on' === loop ) ? ( loopValue = 1 ) : ( loopValue = 0 );
		//Player Control 
    let controlValue;
		( 'on' === player_control  ) ? ( controlValue = 1 ) : ( controlValue = 0 );
		//Video Rel 
    let relValue;
		('on' === video_rel ) ? ( relValue = 1 ) : ( relValue = 0 );

 
    let inftncYoutubeIframe = null;

    if (video_type === 'video' && video_method === 'video_url') {

      const videoId = this.getYouTubeVideoId(youtube_url);
      
      if (videoId) {

        const iframeSrc = `https://www.youtube.com/embed/${videoId}?controls=${controlValue}&amp;autoplay=${autoplayValue}&amp;loop=${loopValue}&amp;mute=${muteValue}&amp;start=${video_start}&amp;end=${video_end}&amp;rel=${relValue}`;

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
    } else if ( video_type === 'video' && video_method === 'video_id' ) {

      const iframeSrc = `https://www.youtube.com/embed/${youtube_id}?controls=${controlValue}&amp;autoplay=${autoplayValue}&amp;loop=${loopValue}&amp;mute=${muteValue}&amp;start=${video_start}&amp;end=${video_end}&amp;rel=${relValue}`;

      inftncYoutubeIframe = (
        <iframe 
          src={iframeSrc} 
          title="YouTube video player" 
          frameBorder="0" 
          allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
          allowFullScreen
        ></iframe>
      );

    } else if ( video_type === 'video' && video_method === 'embed_code' && youtube_url ) {

      inftncYoutubeIframe = <div dangerouslySetInnerHTML={{__html: youtube_embed}}></div>

    } else if (video_type  === 'playlist' && 'video_url' ===  video_method  ) {

      const videoId = this.getYouTubeVideolistId(youtube_url);
      
      if (videoId) {

        const iframeSrc = `https://www.youtube.com/embed/videoseries?controls=${controlValue}&amp;autoplay=${autoplayValue}&amp;loop=${loopValue}&amp;mute=${muteValue}&amp;start=${video_start}&amp;end=${video_end}&amp;rel=${relValue}&amp;list=${videoId}`;

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


    } else if ( video_type  === 'playlist' && 'video_id'  ===   video_method ) {

      const iframeSrc = `https://www.youtube.com/embed/videoseries?controls=${controlValue}&amp;autoplay=${autoplayValue}&amp;loop=${loopValue}&amp;mute=${muteValue}&amp;start=${video_start}&amp;end=${video_end}&amp;rel=${relValue}&amp;list=${youtube_id}`;

        inftncYoutubeIframe = (
          <iframe 
            src={iframeSrc} 
            title="YouTube video player" 
            frameBorder="0" 
            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowFullScreen
          ></iframe>
        );

    }  else if ( video_type  === 'playlist' && 'embed_code'  ===   video_method ) {

       inftncYoutubeIframe = <div dangerouslySetInnerHTML={{__html: youtube_embed}}></div>

    }

    return (

      <div className="inftnc_youtube_embed_wrapper">
          {inftncYoutubeIframe}
      </div>

    );
  }

  getYouTubeVideoId(url) {
    const regex = /(?:youtube(?:-nocookie)?\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^“&?\/ ]{11})/i;
    const match = url.match(regex);
    return match ? match[1] : null;
  }

  getYouTubeVideolistId(url) {
    const regex = /(?:youtube(?:-nocookie)?\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]list=)|youtu\.be\/)([^“&?\/ ]{34})/i;
    const match = url.match(regex);
    return match ? match[1] : null;
  }

}

export default YoutubeEmbed;

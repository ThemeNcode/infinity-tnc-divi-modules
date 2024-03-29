// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class VimeoVideo extends Component {

  static slug = 'inftnc_vimeo_video';

  render() {

    const {vimeo_method,vimeo_url,vimeo_id,vimeo_start,autoplay,mute,loop,player_control,intro_portait,intro_title,intro_byline,playsinline,vimeo_color,vimeo_embed} = this.props;

    let autoplayValue;
    //Autoplay Value
    ( 'on' === autoplay ) ? ( autoplayValue = 1 ) : ( autoplayValue = 0 );
    let muteValue;
    ( 'on' === mute ) ? ( muteValue = 1 ) : ( muteValue = 0 );
    let loopValue;
    ( 'on' === loop ) ? ( loopValue = 1 ) : ( loopValue = 0 );
    let controlValue;
    ( 'on' === player_control ) ? ( controlValue = 1 ) : ( controlValue = 0 );
    let introValue;
    ( 'on' === intro_title ) ? ( introValue = 1 ) : ( introValue = 0 );
    let introBylineValue;
    ( 'on' === intro_byline ) ? ( introBylineValue = 1 ) : ( introBylineValue = 0 );
    let introPortaitValue;
    ( 'on' === intro_portait ) ? ( introPortaitValue = 1 ) : ( introPortaitValue = 0 );
    let playsinlineValue;
    ( 'on' === playsinline ) ? ( playsinlineValue = 1 ) : ( playsinlineValue = 0 );

    let vimeoIframe;

    if(vimeo_method === 'vimeo_url'){

       const videoId = this.getVimeooVideoId(vimeo_url);

       if(videoId) {

        const iframeSrc = `https://player.vimeo.com/video/${videoId}?&autoplay=${autoplayValue}&loop=${loopValue}&muted=${muteValue}&controls=${controlValue}&title=${introValue}&byline=${introBylineValue}&portrait=${introPortaitValue}&#t=${vimeo_start}&color=${vimeo_color}&playsinline=${playsinlineValue}`;
           
        vimeoIframe = (

          <iframe 
            src={iframeSrc} 
            frameborder="0" 
            allow="autoplay; fullscreen; picture-in-picture" 
            allowfullscreen
         ></iframe>

        );

       }

    } else if (vimeo_method === 'vimeo_id') {

      const iframeSrc = `https://player.vimeo.com/video/${vimeo_id}?&autoplay=${autoplay}&loop=${loop}&muted=${mute}&controls=${player_control}&title=${intro_title}&byline=${intro_byline}&portrait=${intro_portait}&#t=${vimeo_start}&color=${vimeo_color}&playsinline=${playsinline}`;
           
        vimeoIframe = (

          <iframe 
            src={iframeSrc} 
            frameborder="0" 
            allow="autoplay; fullscreen; picture-in-picture" 
            allowfullscreen
         ></iframe>

        );

    } else if (vimeo_method === 'embed_code') {
        vimeoIframe = <div dangerouslySetInnerHTML={{__html: vimeo_embed}}></div>
    }

    return (
      <Fragment>
            {vimeoIframe}
      </Fragment>
    );
  }

  getVimeooVideoId(url) {
    const regex = /^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$/im;
    const match = url.match(regex);
    return match ? match[3] : null;
  }

}

export default VimeoVideo;

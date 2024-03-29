// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class VimeoVideo extends Component {

  static slug = 'inftnc_vimeo_video';

  render() {

    const {vimeo_method,vimeo_url,vimeo_id,vimeo_start,autoplay,mute,loop,player_control,intro_portait,intro_title,intro_byline,playsinline,vimeo_color,vimeo_embed} = this.props;
    
    let vimeoIframe;

    if(vimeo_method === 'vimeo_url'){

       const videoId = this.getVimeooVideoId(vimeo_url);

       if(videoId) {

        const iframeSrc = `https://player.vimeo.com/video/${videoId}?&autoplay=${autoplay}&loop=${loop}&muted=${mute}&controls=${player_control}&title=${intro_title}&byline=${intro_byline}&portrait=${intro_portait}&#t=${vimeo_start}&color=${vimeo_color}&playsinline=${playsinline}`;
           
        vimeoIframe = (

          <iframe 
            src={iframeSrc} åå
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

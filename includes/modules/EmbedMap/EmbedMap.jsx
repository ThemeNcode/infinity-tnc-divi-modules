// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class EmbedMap extends Component {

  static slug = 'inftnc_embed_map';
   
  render() {
  
    const { source_type, latitude_longitude, map_zoom, embed_code } = this.props;

    let tncIframe;
    if (source_type === 'emebed_code') {
      tncIframe = <div dangerouslySetInnerHTML={{__html: embed_code}}></div>
    } else if (source_type === 'latitude_longitude') {
        const iframeSrc = `https://maps.google.com/maps?q=${latitude_longitude}&z=${map_zoom}&output=embed`;
        tncIframe = <iframe src={iframeSrc}></iframe>;
    }

    return (
        <div className="inftnc_embed_map_wrapper">
            {tncIframe}
        </div>
    );
}
}

export default EmbedMap;

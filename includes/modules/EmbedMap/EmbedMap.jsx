// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class EmbedMap extends Component {

  static slug = 'inftnc_embed_map';
   
  render() {
  
    const { map_type, source_type, latitude_longitude, map_zoom, embed_code } = this.props;
    
    let iframe;
    if (source_type === 'emebed_code') {
      iframe = <div dangerouslySetInnerHTML={{__html: embed_code}}></div>
    } else if (source_type === 'latitude_longitude') {
        const iframeSrc = `https://maps.google.com/maps?q=${latitude_longitude}&z=${map_zoom}&output=embed`;
        iframe = <iframe src={iframeSrc}></iframe>;
    }

    return (
        <div className="inftnc_embed_map_wrapper">
            {iframe}
        </div>
    );
}
}

export default EmbedMap;

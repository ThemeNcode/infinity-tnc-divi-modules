// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class EmbedMap extends Component {

  static slug = 'inftnc_embed_map';

  render() {
    const { map_type, source_type, latitude_longitude, map_zoom, embed_code } = this.props;
  
    let iframe;
  
    if (source_type === 'embed_code' && map_type === 'google_map') {
        iframe = <iframe src={embed_code}></iframe>;
    } else if (source_type === 'latitude_longitude' && map_type === 'google_map') {
        const { latitude, longitude } = latitude_longitude;
        const iframeSrc = `https://maps.google.com/maps?q=${latitude_longitude}&z=${map_zoom}&output=embed`;
        iframe = <iframe src={iframeSrc}></iframe>;
    }

    console.log(latitude_longitude);
    return (
        <div className="inftnc_embed_map_wrapper">
            {iframe}
        </div>
    );
}
}

export default EmbedMap;

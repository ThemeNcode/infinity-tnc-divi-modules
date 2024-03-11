// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';

class TypeWriter extends Component {

  static slug = 'inftnc_type_writer';

  render() {

    const {before_text,typing_text,after_text,typing_speed,typing_backspeed,pause_for,typing_cursor,typing_loop} = this.props;

    return (
          <div class="inftnc_typewriter_wrapper">
              <h1 class="inftnc_typewriter_main_title">
                  <span class="inftnc_before_text"></span>
                  <span class="inftnc_typewriter_text"></span>
                  <span class="inftnc_after_text"></span>
              </h1>
          </div>
    );
  }
}

export default TypeWriter;

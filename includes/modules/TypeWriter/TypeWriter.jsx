// External Dependencies
import React, { Component } from 'react';
import Typewriter from 'typewriter-effect';

// Internal Dependencies
import './style.css';

class TypeWriter extends Component {

  static slug = 'inftnc_type_writer';

  render() {

    const {before_text,typing_text,after_text,typing_speed,typing_backspeed,pause_for,typing_cursor,typing_loop,title_level} = this.props;
    const HeadingTag = `${title_level}`;
    const typingText = typing_text.split("|");
    let loopValue;
    ( typing_loop === 'on') ? ( loopValue = true) : ( loopValue = false) ;

    return (
          <div class="inftnc_typewriter_wrapper">
              <HeadingTag class="inftnc_typewriter_main_title">
                  <span class="inftnc_before_text">{before_text}</span>
                  <span class="inftnc_typewriter_text">
                  <Typewriter
                      options={{
                        strings:typingText,
                        autoStart: true,
                        loop: loopValue,
                        delay: typing_speed,
                        deleteSpeed:typing_backspeed,
                        pauseFor: pause_for,
                        cursor: typing_cursor,
                      }}
                    />
                  </span>
                  <span class="inftnc_after_text">{after_text}</span>
              </HeadingTag>
          </div>
    );
  }
}

export default TypeWriter;
